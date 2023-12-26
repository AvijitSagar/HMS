// meal record add form a month year picker a autometic current month r year show korar jonno 
document.addEventListener("DOMContentLoaded", function() {
    // Get the current date
    const currentDate = new Date();

    // Get the current year and month in the format YYYY-MM
    const currentYear = currentDate.getFullYear();
    const currentMonth = (currentDate.getMonth() + 1).toString().padStart(2, '0'); // Adding 1 because months are zero-based

    // Set the value of the input field
    const monthYearInput = document.getElementById('month_year');
    monthYearInput.value = `${currentYear}-${currentMonth}`;
});