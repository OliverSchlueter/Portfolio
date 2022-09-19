function setupRisingNumbers() {
    // contributions last years
    fetch("assets/php/fetchContributions.php")
        .then(res => res.json())
        .then(out => {
            document.getElementById("contribution_counter").setAttribute("rising_number", out.contributions)
        })
}

setupRisingNumbers();