print_success_mark() {
    echo -e "\e[32m\u2714\e[0m"
}

print_failure_mark() {
  print_error "\u2716"
}

print_error() {
  echo -e "\e[31m$1\e[0m"
}