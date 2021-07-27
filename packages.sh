# List the packages you'd like to have installed
# This list of packages assumes you're installing on a fresh ArchLinux install with minimal applications installed
# If a package listed is already installed it will NOT be reinstalled
declare -a install_packages
install_packages=(
  # Base Linux packages
  man
  vim
  xclip

  # KDE specific utilities and apps
  ark

  # Package management tools
  yay

  # Improved command line apps and replacements
  jq
  exa
  bat

  # Our preferred shell and shell customizations
  zsh
  starship

  # Development tools and programming languages
  docker
  postgresql
  php

  # Web Browsers
  firefox

  # Communication programs
  signal-desktop
  telegram-desktop

  # End-user terminal applications
  gopass
)
export install_packages