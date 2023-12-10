
  <script type="text/javascript">
    function printDiv(divName) {
         var printContents = document.getElementById(divName).innerHTML;
         var originalContents = document.body.innerHTML;

         document.body.innerHTML = printContents;

         window.print();

         document.body.innerHTML = originalContents;
    }
  </script>
  <style type="text/css" media="print">
    @page
    {
        size: auto;   /* auto is the initial value */
        margin: 0mm;  /* this affects the margin in the printer settings */
    }
</style>

  <body>

    <div align="center">
      <table style="padding:20px 40px; cell-padding:0px 0px;" border="0" width="100%">
        <tr>
          <td rowspan="4"><img src="images/logo.png" width="100px" height="100px"/></td>
          <td align='center' style="font-size:26px; color:#0a7b70;"><b>Belkien  Masinde</b></td>

        </tr>
        <!-- <tr>
          <td align='center' style="font-size:22px; color:#0a7b70;"><b>Sample Test,</b></td>
        </tr>
        <tr>
          <td align='center' style="font-size:20px; color:#198790;">No.710, Nairobi, Kenya (700002).</td>
        </tr>
        <tr>
          <td align='center' style="font-size:20px; color:#198790;">Reg No.: PNA/1010/0011</td>
        </tr> -->
      </table>
      <table width="90%" align="center" style=" border-collapse: collapse; " border="1" >
        <tr>
          <td width="23%" style="border: solid 1px #7cc5cb;">&nbsp;&nbsp;<b> Name</b></td>
          <td width="30%" style="border: solid 1px #7cc5cb;">&emsp;<?php echo $patient_name; ?></td>
          <td width="25%" style="border: solid 1px #7cc5cb;">&nbsp;&nbsp;<b>number</td>
          <td style="border: solid 1px #7cc5cb;">&emsp;<?php echo " ".$age; ?></b></td>

        </tr>
        <tr>
          <td style="border: solid 1px #7cc5cb; letter-spacing:1px;">&nbsp;&nbsp;<b>Number ID</b></td>
          <td style="border: solid 1px #7cc5cb;">&emsp;<?php echo $pid; ?></td>
          <!-- <td style="border: solid 1px #7cc5cb; letter-spacing:1px;">&nbsp;&nbsp;<b>Sex</b></td><td style="border: solid 1px #7cc5cb;">&emsp;<?php echo " ".$gender; ?></td> -->

        </tr>
        <tr>
          <td style="border: solid 1px #7cc5cb; letter-spacing:1px;">&nbsp;&nbsp;<b>Reviewed by</b></td>
          <td style="border: solid 1px #7cc5cb;">&emsp;<?php echo $referred; ?></td>
          <td style="border: solid 1px #7cc5cb; letter-spacing:1px;">&nbsp;&nbsp;<b>Date</b></td><td style="border: solid 1px #7cc5cb;">&emsp;<?php echo date("d/m/Y"); ?></td>

        </tr>
        <tr>
          <td style="border: solid 1px #7cc5cb; letter-spacing:1px;">&nbsp;&nbsp;<b>Content Owner</b></td>
          <td style="border: solid 1px #7cc5cb;">&emsp;<b>Front office, Vincent Ochieng</b></td>
          <td style="border: solid 1px #7cc5cb; letter-spacing:1px;">&nbsp;&nbsp;<b>content</b></td><td style="border: solid 1px #7cc5cb;">&emsp;<?php echo $indication; ?></td>
        </tr>
      </table>
      <!-- <p align="left" style="padding-left:5%;">Dear mr, Thanks for your review.</p> -->
    </div>
