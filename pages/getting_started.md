---
title: Getting Started
---

This is the eduVPN/Let's Connect! documentation repository. This repository 
targets administrators and developers. It contains information on how to deploy 
the VPN software, but also (technical) details about the implementation needed 
to (better) integrate it in existing infrastructure, and how to modify the 
software for one's own needs.

For more information see:

- https://www.eduvpn.org
- https://letsconnect-vpn.org

**NOTE**: if you are an end-user of eduVPN and want to contact someone, please
contact [eduvpn-support@lists.geant.org](mailto:eduvpn-support@lists.geant.org).

# Features

This is an (incomplete) list of features of the VPN software:

- OpenVPN server accepting connections on both UDP and TCP ports;
- Uses multiple OpenVPN processes for load sharing purposes;
- Scales from a Raspberry Pi to many core systems with 10GBit networking;
- Full IPv6 support, using IPv6 inside the tunnel and connecting over IPv6;
- Support both NAT and publically routable IP addresses;
- CA for managing client certificates;
- [Secure](SECURITY.md) server and client configuration out of the box;
- User Portal to allow users to manage their configurations for their 
  devices;
- Admin Portal to manage users, configurations and connections;
- Multi Language support in User Portal and Admin Portal;
- Authentication to portals using "static" username and password, 
  [LDAP](LDAP.md), [RADIUS](RADIUS.md) and [SAML](SAML.md);
- OAuth 2.0 [API](API.md) for integration with applications;
- [Two-factor authentication](2FA.md) TOTP support with user self-enrollment;
- [Deployment scenarios](PROFILE_CONFIG.md):
  - Route all traffic over the VPN (for safer Internet usage on untrusted 
    networks);
  - Route only some traffic over the VPN (for access to the organization 
    network);
  - Client-to-client (only) networking;
- Group [ACL](ACL.md) support with SAML and LDAP;
- Ability to disable all OpenVPN logging (default);
- Support multiple deployment scenarios [simultaneously](MULTI_PROFILE.md);
- [SELinux](SELINUX.md) fully enabled;
- [Guest Usage](GUEST_USAGE.md) scenario;
- Native [applications](CLIENT_COMPAT.md) available for most common platforms.

# Client Support

See [Client Compatibility](CLIENT_COMPAT.md) for more information about the 
supported OpenVPN clients.

# Deployment

**NOTE**: if you plan to run eduVPN/Let's Connect! please consider subscribing 
to the mailing list 
[here](https://list.surfnet.nl/mailman/listinfo/eduvpn-deploy). It will be used 
for announcements of updates and discussion about running 
eduVPN/Let's Connect!.

You can also use IRC for support & feedback: [freenode](https://freenode.net/), 
channel `#eduvpn`.

## Supported Operating Systems

* [CentOS & Red Hat Enterprise Linux](DEPLOY_CENTOS.md) 7 (`x86_64`)
* [Fedora](DEPLOY_FEDORA.md) 31, 32 (`x86_64`)

Currently we do NOT support CentOS & Red Hat Enterprise Linux 8. We are waiting 
for [this](https://pagure.io/epel/issue/75) to be resolved. We avoid using 
third party PHP repositories to prevent having to support these repositories
in the future.

**NOTE**: we expect ALL software updates to be installed and the server 
rebooted before you install the software!

**NOTE**: if you want to deploy on multiple machines for load balancing, please 
follow [these](MULTI_NODE.md) instructions!

## Experimental

* [Debian 9](DEPLOY_DEBIAN.md) (`x86_64`) 
  ([Open Issues](https://github.com/eduvpn/eduvpn-debian/issues))
* [Fedora](DEPLOY_FEDORA.md) 31 (`aarch64`), 32 (`x86_64`, `aarch64`) 
  (Only available through the "development" repository)

You can use the `aarch64` packages on e.g. the [Raspberry Pi](RASPBERRY_PI.md).

# Development

See [DEVELOPMENT_SETUP](DEVELOPMENT_SETUP.md).

# Security Contact

If you find a security problem in the code, the deployed service(s) and want to
report it responsibly, contact [fkooman@tuxed.net](mailto:fkooman@tuxed.net). 
You can use PGP. My key is `0x9C5EDD645A571EB2`. The full fingerprint is 
`6237 BAF1 418A 907D AA98  EAA7 9C5E DD64 5A57 1EB2`.
