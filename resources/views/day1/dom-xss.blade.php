 <head>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     <script>
         let output = "";

         <?php
         if (isset($_GET['q'])) {
             printf('output = "%s";', $_GET['q']);
         }
         ?>
         $(function() {

             $("#output").html(output);
         })
     </script>

 </head>

 <body>
     <h1>DOM XSS</h1>
     <p id="output"></p>

 </body>

 http://127.0.0.1:8000/day1/dom-xss?q=<script>
     alert("This is a XSS attack!") < /scr"%2B"ipt>
