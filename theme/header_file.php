
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
          <td align='center' style="font-size:26px; color:#21618c;"><b>Belkian</b></td>

        </tr>
        <!-- <tr>
          <td align='center' style="font-size:22px; color:#21618c;"><b>Sample CENTRE,</b></td>
        </tr>
        <tr>
          <td align='center' style="font-size:20px; color:#21618c;">No.1234 (632).</td>
        </tr>
        <tr>
          <td align='center' style="font-size:20px; color:#21618c;">Reg No.: 909090</td>
        </tr> -->
      </table>
      <table width="90%" align="center" style=" border-collapse: collapse; " border="1" >
        <tr>
          <td width="23%" style="border: solid 1px #21618c;">&nbsp;&nbsp;<b> Name</b></td>
          <td width="30%" style="border: solid 1px #21618c;">&emsp;<?php echo $patient_name; ?></td>
          <!-- <td width="25%" style="border: solid 1px #21618c;">&nbsp;&nbsp;<b>Age</b></td>
          <td style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo " ".$age; ?></td> -->

        </tr>
        <tr>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Number ID</b></td>
          <td style="border: solid 1px #21618c;">&emsp;<?php echo $pid; ?></td>
          <!-- <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Sex</b></td>
          <td style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo $gender; ?></td> -->
        </tr>
        <tr>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Reviewed by</b></td>
          <td style="border: solid 1px #21618c;">&emsp;<?php echo $referred; ?></td>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Date</b></td>
          <td style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo date("d/m/Y"); ?></td>

        </tr>
        <tr>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>Owner</b></td>
          <td style="border: solid 1px #21618c; font-size:14px; font-family: Arial;">&nbsp;&nbsp;<b>Front office, ochieng</b></td>
          <td style="border: solid 1px #21618c; letter-spacing:1px;">&nbsp;&nbsp;<b>content</b></td>
          <td style="border: solid 1px #21618c;">&nbsp;&nbsp;<?php echo $indication; ?></td>
        </tr>
      </table>
      <!-- <p align="left" style="padding-left:5%;">Dear Dr, Thanks for your review.</p> -->
    </div>
