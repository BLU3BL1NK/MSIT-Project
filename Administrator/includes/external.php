<?php
    include '../connection/connection.php';
    session_start();
?>

<html>
    <style>
        a:link {
            text-decoration: none;
        }

        a:visited {
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        a:active {
            text-decoration: underline;
        }
    </style>
<body>
    <div id="datacontainer" style="position:absolute;left:1px;top:10px;width:100%" onMouseover="scrollspeed=0" onMouseout="scrollspeed=cache">

        <!-- ADD YOUR SCROLLER CONTENT INSIDE HERE -->

        <?php
            $X = mysqli_query($cnn,"SELECT * FROM tblnews order by No desc");
            while ($XX = mysqli_fetch_array($X)) {
                echo "<p><font color='#FF0000'>" . $XX[1] . "</font><br>Date Posted: <font color='#0000FF'>" . date('F d, Y',strtotime($XX[2])) . "</font></p>";
            }
        ?>

        <!-- END SCROLLER CONTENT -->

    </div>

        <script type="text/javascript">
            //Specify speed of scroll. Larger=faster (ie: 5)
            var scrollspeed=cache=1

            //Specify intial delay before scroller starts scrolling (in miliseconds):
            var initialdelay=500

            function initializeScroller(){
                dataobj=document.all? document.all.datacontainer : document.getElementById("datacontainer")
                dataobj.style.top="5px"
                setTimeout("getdataheight()", initialdelay)
            }

            function getdataheight(){
            thelength=dataobj.offsetHeight
            if (thelength==0)
                setTimeout("getdataheight()",10)
            else
                scrollDiv()
            }

            function scrollDiv(){
            dataobj.style.top=parseInt(dataobj.style.top)-scrollspeed+"px"
            if (parseInt(dataobj.style.top)<thelength*(-1))
                dataobj.style.top="5px"
                setTimeout("scrollDiv()",40)
            }

            if (window.addEventListener)
                window.addEventListener("load", initializeScroller, false)
            else if (window.attachEvent)
                window.attachEvent("onload", initializeScroller)
            else
                window.onload=initializeScroller

        </script>

    </body>
</html>
