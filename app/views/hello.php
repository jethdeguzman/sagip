<div id="chat"></div>
    <form id="send-message">
        <input type="text" id="message" />
        <input type="submit" value="submit" />
    </form>
     <canvas id="canvas" height="450" width="600"></canvas>
    <script src="assets/js/jquery-1.9.1.min.js"></script>
    <script src="assets/js/socket.io.js"></script>
     <script src="assets/js/Chart.min.js"></script>
    <script type="text/javascript">
    
    jQuery(function($){

        var socket = io.connect("http://localhost:3000");
        var $messageForm = $('#send-message');
        var $messageBox = $('#message');
        var $chat = $('#chat');

        $messageForm.submit(function(e){
            e.preventDefault();
            socket.emit('send message', $messageBox.val());
            $messageBox.val('');
        });

        socket.on('new message', function(data){
            $chat.append(data + "<br/>");
           
            console.log(lineChartData.datasets[1].data);
            lineChartData.datasets[1].data = [];
             lineChartData.datasets[1].data.push(50,90,34,12);
             myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
        });
    });


        var lineChartData = {
            labels : ["January","February","March","April","May","June","July"],
            datasets : [
                {
                    fillColor : "rgba(220,220,220,0.5)",
                    strokeColor : "rgba(220,220,220,1)",
                    pointColor : "rgba(220,220,220,1)",
                    pointStrokeColor : "#fff",
                    data : [65,59,90,81,56,55,40]
                },
                {
                    fillColor : "rgba(151,187,205,0.5)",
                    strokeColor : "rgba(151,187,205,1)",
                    pointColor : "rgba(151,187,205,1)",
                    pointStrokeColor : "#fff",
                    data :  [65,59,90,81,56,55,40]
                }
            ]
        }

    var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
    
    </script>