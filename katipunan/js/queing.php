<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Queuing System</title>
    <style>
        body {
            font-family: sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
        }
        input[type="text"] {
            padding: 10px;
            margin-bottom: 10px;
            width: 100%;
        }
        button {
            padding: 10px 20px;
            background-color: #333;
            color: white;
            border: none;
            cursor: pointer;
        }
        #queue {
            list-style: none;
            padding: 0;
            margin: 20px 0;
        }
        #queue li {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        #download {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Queuing System</h1>
        <form id="add-form">
            <input type="text" id="name" placeholder="Name">
            <input type="text" id="course" placeholder="Course">
            <input type="text" id="block" placeholder="Block">
            <button type="button" id="add-btn">Add to Queue</button>
        </form>
        <ul id="queue"></ul>
        <button id="download">Download Queue (Text File)</button>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
  

    </script>
</body>
</html>
