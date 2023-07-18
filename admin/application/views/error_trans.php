
 <style>
        * {
            margin: 0;
            padding: 0;
        }

       

        .error-code {     
            font-size: 200px;
            color: white;
            color: rgba(255, 255, 255, 0.98);
            width: 50%;
            text-align: right;
            margin-top: 5%;
            text-shadow: 5px 5px hsl(0, 0%, 25%);
            float: left;
        }

        .not-found {
          
            width: 45%;
            float: right;
            margin-top: 5%;
            font-size: 50px;
            color: white;
            text-shadow: 2px 2px 5px hsl(0, 0%, 61%);
            padding-top: 70px;
        }

        .clear {
            float: none;
            clear: both;
        }

        .content {
            text-align: center;
            line-height: 30px;
        }

     

      

    </style>
<h1> <p class="error-code">404</p> </h1>
<h2><p class="not-found">Not<br/>Found</p></h2>
<div class="clear"></div>
<div class="content">
    The page your are looking for is not found. Kindly add and check again.
    <br>
    <a href="<?php echo base_url(); ?>">Go Home</a>
</div>
