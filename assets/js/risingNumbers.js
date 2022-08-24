function setupRisingNumbers() {
    // contributions last years
    fetch("assets/php/fetchContributions.php")
        .then(res => res.json())
        .then(out => {
            document.getElementById("contribution_counter").setAttribute("rising_number", out.contributions)
        })

    // days daily coding
    const dailyCodingDays = (new Date() - new Date('7/19/2022')) / (1000 * 3600 * 24);
    setTimeout(() => {
        document.getElementById("daily_coding_counter").setAttribute("rising_number", dailyCodingDays)
    }, 10);
}

setupRisingNumbers();