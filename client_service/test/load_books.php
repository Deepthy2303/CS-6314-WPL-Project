<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        
		<script src="js/jquery-1.10.2.js" type="text/javascript"></script>
        <style type="text/css">
            tr.header
            {
                font-weight:bold;
            }
            tr.alt
            {
                background-color: #777777;
            }
        </style>
        <script type="text/javascript">
            $(document).ready(function(){
               $('.striped tr:even').addClass('alt');
            });
        </script>
        <title></title>
    </head>
    <body>
	<table class="striped">
            <tr class="header">
                <td>Id</td>
                <td>Name</td>
                <td>Title</td>
            </tr>
        </table>
    </body>
	<script src="load_books.js" type="text/javascript"></script>
</html>