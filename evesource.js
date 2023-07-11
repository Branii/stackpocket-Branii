
    
    let eventSource = new EventSource("../admin/timed")
    // Define the event listener to handle incoming events
    eventSource.addEventListener('message', function(event) {
        const eventData = JSON.parse(event.data);
        $(".timed").text(eventData.message);
        //console.log('Received event:', eventData);
    });

    // Handle errors and connection closures
    // eventSource.addEventListener('error', function(event) {
    // if (event.readyState === EventSource.CLOSED) {
    //     console.log('Connection closed.');
    // } else {
    //     console.log('Error occurred:', event);
    // }

    // });