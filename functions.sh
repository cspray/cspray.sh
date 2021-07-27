print_success_mark() {
    echo -e "\e[32m\u2714\e[0m"
}

print_failure_mark() {
  echo -e "\e[31m\u2716\e[0m"
}

os_info() {
  declare -A os_info_map

  echo "${os_info_map[*]}"
}