---
title: Getting Started
---

This is the eduVPN/Let's Connect! documentation site. This site targets 
administrators and developers. It contains information on how to deploy the 
VPN software, but also (technical) details about the implementation needed to 
(better) integrate it in existing infrastructure, and how to modify the 
software for one's own needs.

**NOTE**: if you are an end-user of eduVPN and want to contact someone, please
contact [eduvpn@surfnet.nl](mailto:eduvpn@surfnet.nl).

### Features

This is an (incomplete) list of features of the VPN software:

- OpenVPN server accepting connections on both UDP and TCP ports;
- Uses multiple OpenVPN processes for load sharing purposes;
- Scales from a Raspberry Pi to many core systems with 10GBit networking;
- Full IPv6 support, using IPv6 inside the tunnel and connecting over IPv6;
- Support both NAT and publically routable IP addresses;
- CA for managing client certificates;
- [Secure](docs/SECURITY.md) server and client configuration out of the box;
- User Portal to allow users to manage their configurations for their 
  devices;
- Admin Portal to manage users, configurations and connections;
- Multi Language support in User Portal and Admin Portal;
- Authentication to portals using "static" username and password, 
  [LDAP](docs/LDAP.md), [RADIUS](docs/RADIUS.md) and [SAML](docs/SAML.md);
- OAuth 2.0 [API](docs/API.md) for integration with applications;
- [Two-factor authentication](docs/2FA.md) TOTP support with user self-enrollment;
- [Deployment scenarios](docs/PROFILE_CONFIG.md):
  - Route all traffic over the VPN (for safer Internet usage on untrusted 
    networks);
  - Route only some traffic over the VPN (for access to the organization 
    network);
  - Client-to-client (only) networking;
- Group [ACL](docs/ACL.md) support with SAML and LDAP;
- Ability to disable all OpenVPN logging (default);
- Support multiple deployment scenarios [simultaneously](docs/MULTI_PROFILE.md);
- [SELinux](docs/SELINUX.md) fully enabled;
- [Guest Usage](docs/GUEST_USAGE.md) scenario;
- Native [applications](docs/CLIENT_COMPAT.md) available for most common platforms.

### Client Support

See [Client Compatibility](docs/CLIENT_COMPAT.md) for more information about the 
supported OpenVPN clients.

### Deployment

**NOTE**: if you plan to run eduVPN/Let's Connect! please consider subscribing 
to the mailing list 
[here](https://list.surfnet.nl/mailman/listinfo/eduvpn-deploy). It will be used 
for announcements of updates and discussion about running 
eduVPN/Let's Connect!.

You can also use IRC for support & feedback: [freenode](https://freenode.net/), 
channel `#eduvpn`.

#### Supported Operating Systems

* [CentOS & Red Hat Enterprise Linux 7](docs/DEPLOY_CENTOS.md) (x86_64)
* [Fedora 29](docs/DEPLOY_FEDORA.md) (x86_64)

**NOTE**: we expect ALL software updates to be installed and the server 
rebooted before you install the software!

#### Experimental

* [Debian](docs/DEPLOY_DEBIAN.md) (x86_64) ([issues](https://github.com/eduvpn/eduvpn-debian/issues))
* [Fedora 29](docs/DEPLOY_FEDORA.md) (aarch64)

### Development

See [DEVELOPMENT_SETUP](docs/DEVELOPMENT_SETUP.md).

### Security Contact

If you find a security problem in the code, the deployed service(s) and want to
report it responsibly, contact [fkooman@tuxed.net](mailto:fkooman@tuxed.net). 
You can use PGP. My key is `0x9C5EDD645A571EB2`. The full fingerprint is 
`6237 BAF1 418A 907D AA98  EAA7 9C5E DD64 5A57 1EB2`.
