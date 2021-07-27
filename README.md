# cspray.sh

A set of bash scripts and configurations used to setup a fresh ArchLinux (or derivative) using KDE. Specifically, these scripts will automate the following tasks:

- Install a series of "default" packages. For an exact list of packages installed please reference `/packages.sh`.
- Create a new SSH key using ed25519 algorithm and upload it into 
- Import GPG keys from a secure USB drive that are used for encrypting/decrypting passwords.
- Configure global git settings include default name and global .gitignore.
- Setup a custom zsh setup with predefined plugins and .zshrc configuration.

## Prerequisites

The following conditions will need to be met before installing and using this software.

1. A successful installation of ArchLinux with KDE. (a)
1. A terminal with sudo access and `git` installed.
1. An encrypted USB drive with secure credentials used for sensitive steps of the process.

(a) While this has only been tested on "vanilla" ArchLinux installs this should work on any Arch-based distro. Future
updates should allow non-Arch based distros.

## Installation

