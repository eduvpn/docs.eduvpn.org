<?php

require_once dirname(__DIR__).'/vendor/autoload.php';
$baseDir = dirname(__DIR__);

use eduVPN\Web\Markdown;
use eduVPN\Web\Tpl;

$dateTime = new DateTime();
$docDir = sprintf('%s/documentation', $baseDir);
$pageDir = sprintf('%s/pages', $baseDir);
$templateDir = sprintf('%s/views', $baseDir);
$outputDir = sprintf('%s/output', $baseDir);

@mkdir($outputDir, 0755, true);
@mkdir($outputDir.'/img', 0755, true);
@mkdir($outputDir.'/download', 0755, true);
@mkdir($outputDir.'/css', 0755, true);

$markdownParser = new Markdown();

$templates = new Tpl([$templateDir]);
$templates->addDefault(
    [
        'blogTitle' => 'eduVPN',
        'blogDescription' => 'Safe and Trusted',
        'blogAuthor' => 'eduVPN',
        'generatedOn' => $dateTime->format(DateTime::ATOM),
        'currentYear' => $dateTime->format('Y'),
    ]
);

$docsList = [];
$pagesList = [];

foreach (glob(sprintf('%s/*.md', $pageDir)) as $pageFile) {
    $pageInfo = [];

    $f = fopen($pageFile, 'r');
    $line = fgets($f);
    if (0 !== strpos($line, '---')) {
        continue;
//        throw new Exception(sprintf('invalid file "%s"!', $pageFile));
    }
    $line = fgets($f);
    do {
        $xx = explode(':', $line, 2);
        $pageInfo[trim($xx[0])] = trim($xx[1]);
        $line = fgets($f);
    } while (0 !== strpos($line, '---'));

    // read rest of the page
    $buffer = '';
    while (!feof($f)) {
        $buffer .= fgets($f);
    }

    fclose($f);
    $pageOutputFile = basename(strtolower($pageFile), '.md').'.html';
    $page = [
        'htmlContent' => $markdownParser->transform($buffer),
        'title' => $pageInfo['title'],
        'fileName' => $pageOutputFile,
    ];
    $pagesList[] = $page;
}

foreach (glob(sprintf('%s/*.md', $docDir)) as $docFile) {
    // ignore README.md
    if (false !== strrpos($docFile, 'README.md')) {
        continue;
    }
    $docInfo = [];

    // obtain docInfo
    $f = fopen($docFile, 'r');
    $line = fgets($f);
    if (0 !== strpos($line, '---')) {
        continue;
//        throw new Exception(sprintf('invalid file! "%s"', $docFile));
    }
    $line = fgets($f);
    do {
        $xx = explode(':', $line, 2);
        $docInfo[trim($xx[0])] = trim($xx[1]);
        $line = fgets($f);
    } while (0 !== strpos($line, '---'));

    // read rest of the doc
    $buffer = '';
    while (!feof($f)) {
        $buffer .= fgets($f);
    }

    fclose($f);
    $docOutputFile = basename(strtolower($docFile), '.md').'.html';
    $docPage = [
        'htmlContent' => $markdownParser->transform($buffer),
        'description' => isset($docInfo['description']) ? $docInfo['description'] : null,
        'publish' => isset($docInfo['publish']) ? 'no' !== $docInfo['publish'] : true,
        'title' => $docInfo['title'],
        'modified' => isset($docInfo['modified']) ? $docInfo['modified'] : null,
        'fileName' => $docOutputFile,
        'category' => isset($docInfo['category']) ? $docInfo['category'] : 'default',
    ];

    $docsList[] = $docPage;
}

$docsCategoryList = [];
foreach ($docsList as $docInfo) {
    $docCategory = ucfirst($docInfo['category']);
    if (!array_key_exists($docCategory, $docsCategoryList)) {
        $docsCategoryList[$docCategory] = [];
    }
    $docsCategoryList[$docCategory][] = $docInfo;
}

// add doc index page
$pagesList[] = [
    'htmlContent' => $templates->render(
        'index',
        [
            'docsCategoryList' => $docsCategoryList,
        ]
    ),
    'requestRoot' => '',
    'title' => 'Docs',
    'fileName' => 'index.html',
];

foreach ($docsList as $doc) {
    if ($doc['publish']) {
        $docPage = $templates->render(
            'post',
            [
                'requestRoot' => '',
                'pagesList' => $pagesList,
                'activePage' => 'index.html',
                'pageTitle' => $doc['title'],
                'doc' => $doc,
            ]
        );
        file_put_contents($outputDir.'/'.$doc['fileName'], $docPage);
    }
}

foreach ($pagesList as $page) {
    $pagePage = $templates->render(
        'page',
        [
            'requestRoot' => isset($page['requestRoot']) ? $page['requestRoot'] : '',
            'activePage' => $page['fileName'],
            'pagesList' => $pagesList,
            'pageTitle' => $page['title'],
            'pageContent' => $page,
        ]
    );
    file_put_contents($outputDir.'/'.$page['fileName'], $pagePage);
}

foreach (['img', 'download', 'css'] as $pathName) {
    foreach (glob($baseDir.'/'.$pathName.'/*') as $file) {
        copy($file, $outputDir.'/'.$pathName.'/'.basename($file));
    }
}
