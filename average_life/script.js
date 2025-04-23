function showAlert() {
    alert("This is a alert message !!");
}

function calculateWeeks(){
    const years = 80;
    const weeks = years * 52;
    alert("Average weeks in a human lifetime: " + weeks);
}

function showGreeting(){
    const st = 'this is a string stored in variable';
    alert(st);
}

function getTimeOfDay(){
    let hour = new Date().getHours();

    let message = '';

    if (hour >= 6 && hour < 12) {
        message = "Good Morning!";
      } else if (hour >= 12 && hour < 17) {
        message = "Good Afternoon!";
      } else if (hour >= 17 && hour < 21) {
        message = "Good Evening!";
      } else {
        message = "Good Night!";
      }
    
      alert("Current time of day: " + message);
}


