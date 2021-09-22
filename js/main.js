window.addEventListener("load", (event) => {
  let population_count_container = document.getElementById(
    "population-count-container"
  );
  population_count_container.innerHTML = ptsp_script_vars.pop_count_copy; // sent from php
});
