print_success_mark() {
    echo -e "\e[32m\u2714\e[0m"
}

print_failure_mark() {
  print_error "\u2716"
}

print_error() {
  echo -e "\e[31m$1\e[0m"
}

is_arch_linux() {
  while read -r line; do
    IFS='=' read -ra key_value <<< "$line"
    key=${key_value[0]}
    value=${key_value[1]}

    if [[ $key == 'ID' ]] || [[ $key == 'ID_LIKE' ]]; then
      if [[ $value == 'arch' ]]; then
        return 0
      fi
    fi
  done < /etc/os-release

  return 1
}

is_kde() {
  if [[ ${XDG_CURRENT_DESKTOP,,} == "kde" ]]; then
    return 0
  else
    return 1
  fi
}