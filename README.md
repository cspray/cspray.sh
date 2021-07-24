# cspray.sh

A set of bash scripts and configurations used to setup a fresh ArchLinux (or derivative) using KDE. Specifically, these scripts will automate the following tasks:

- Install a series of "default" packages. For an exact list of packages installed please reference `/packages.sh`.
- Create a new SSH key using ed25519 algorithm.
- Import GPG keys from a secure USB drive that are used for encrypting/decrypting passwords.
- Configure global git settings include default name and global .gitignore.
- Setup a custom zsh setup with predefined plugins and .zshrc configuration.

## Prerequisites

The following conditions will need to be met before installing and using this software.

1. A successful install of ArchLinux, or derivative, with KDE and basic Linux tools.
1. Access to a terminal with sudo access and `git` preinstalled.
1. Access to encrypted USB drive with GPG keys for password-store.

## Installation

