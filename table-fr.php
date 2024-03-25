<script src="./dist/js/menu/axios.min.js"></script>
<div id="openingHoursTable"></div>
<script>
    axios.get('https://data.accentapi.com/feed/25386616.json?no_cache=20240324131712')
        .then(response => {
            const data = response.data;

            // Extract open hours
            const openHours = {};

            if (data.content.open_hours && typeof data.content.open_hours === 'string') {
                // Parse the stringified JSON if open_hours is a string
                const openHoursArray = JSON.parse(data.content.open_hours);

                openHoursArray.forEach(schedule => {
                    const day = schedule.day;
                    const startTime = formatTime(schedule.time_start); // Format start time
                    const endTime = formatTime(schedule.time_end); // Format end time

                    // Add to openHours object
                    if (!openHours[day]) {
                        openHours[day] = [];
                    }

                    // Check for duplicates before adding
                    if (!openHours[day].find(entry => entry.startTime === startTime && entry.endTime ===
                            endTime)) {
                        openHours[day].push({
                            startTime,
                            endTime
                        });
                    }
                });
            }

            // Create table
            let tableContent = '<table class="table"><tbody>';

            // Display open hours
            const daysOfWeek = {
                "Monday": "Lundi",
                "Tuesday": "Mardi",
                "Wednesday": "Mercredi",
                "Thursday": "Jeudi",
                "Friday": "Vendredi",
                "Saturday": "Samedi",
                "Sunday": "Dimanche"
            };

            for (const day in daysOfWeek) {
                const frenchDay = daysOfWeek[day];
                if (openHours[day]) {
                    tableContent += `<tr><td class="title">${frenchDay}:</td><td class="content">`;
                    if (openHours[day].length === 0) {
                        tableContent += "Fermé";
                    } else {
                        openHours[day].forEach(entry => {
                            tableContent += ` ${entry.startTime} - ${entry.endTime}<br>`;
                        });
                    }
                    tableContent += "</td></tr>";
                } else {
                    tableContent += `<tr><td class="title">${frenchDay}:</td><td class="content">Fermé</td></tr>`;
                }
            }

            // Close table
            tableContent += '</tbody></table>';

            // Append table to the document
            document.getElementById('openingHoursTable').innerHTML = tableContent;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });

    // Function to format time from "1800" to "18:00"
    function formatTime(time) {
        const hours = time.substring(0, 2);
        const minutes = time.substring(2);
        return `${hours}:${minutes}`;
    }
</script>