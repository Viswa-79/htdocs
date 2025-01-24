<?php include "config.php"; ?>


<?php include "head.php"; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>


<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <?php include "menu.php"; ?>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <?php include "header.php"; ?>


                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <style>
                        #myInput {
                            border-radius: 10px;
                            background-image: url('/css/searchicon.png');
                            background-color: lavender;
                            /* Add a search icon to input */
                            background-position: 10px 12px;
                            /* Position the search icon */
                            background-repeat: no-repeat;
                            /* Do not repeat the icon image */
                            width: 100%;
                            /* Full-width */
                            font-size: 16px;
                            /* Increase font-size */
                            padding: 12px 20px 12px 40px;
                            /* Add some padding */
                            border: 1px solid #ddd;
                            /* Add a grey border */
                            margin-bottom: 12px;
                            /* Add some space below the input */
                        }
                    </style>

                    <script>
                        $(document).ready(function () {
                            $("#myInput").on("keyup", function () {
                                //alert("hello");
                                var value = $(this).val().toLowerCase();
                                $("#myTable tr").filter(function () {
                                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                                });
                            });
                        });
                    </script>
                    <script>
                        const myFunction = () => {
                            const trs = document.querySelectorAll('#myTable tr:not(.header)')
                            const filter = document.querySelector('#myInput').value
                            const regex = new RegExp(filter, 'i')
                            const isFoundInTds = td => regex.test(td.innerHTML)
                            const isFound = childrenArr => childrenArr.some(isFoundInTds)
                            const setTrStyleDisplay = ({ style, children }) => {
                                style.display = isFound([
                                    ...children // <-- All columns
                                ]) ? '' : 'none'
                            }

                            trs.forEach(setTrStyleDisplay)
                        }
                    </script>


                    <div class="container-xxl flex-grow-1 container-p-y">

                        <!-- <h1> <input type="text" id="myInput" onKeyUp="myFunction()" placeholder="Search for Anything..." style="width:100%;"> -->

                        </h1>








                        <?php
                        $fromdate = $_REQUEST['fromdate'];
                        $todate = $_REQUEST['todate'];

                        $type = $_REQUEST['type'];
                        $group_name = $_REQUEST['group_name'];
                        $name = $_REQUEST['name'];







                        $aa = array('m.productgrp' => $group_name, 'm.productname' => $name);
                        $aa = array_filter($aa);

                        //print_r($aa);
                        
                        // $aa=array_filter($aa);
                        
                        //print_r($aa);
                        
                        $i = 1;
                        $rr = '';
                        foreach ($aa as $key => $aa1) {
                            if ($i < count($aa)) {
                                $rq = 'and';
                            } else {
                                $rq = '';
                            }
                            $rr = $rr . ' ' . $key . "=" . "'" . $aa[$key] . "'" . " " . $rq;


                            $i++;
                        }


                        if ($rr != '') {

                            $rr = 'where' . $rr;

                        } else {

                            $rr = '';

                        }



                        ?>


                        <div id="mydiv" class="card mb-4  ">



                            <div class="card-header d-flex align-items-center justify-content-between mb-2 mt-0">
                                <button class="btn btn-label-primary waves-effect"> Asset Report</button>
                                <button style="font-size:14px;font-family:table-icons;text-transform:uppercase"
                                    class="btn btn-outline-warning">From :
                                    <?php echo date('d-m-Y', strtotime($fromdate)); ?>&nbsp;|
                                    &nbsp;To : <?php echo date('d-m-Y', strtotime($todate)); ?></button>
                            </div><br>
                            <div class="table-responsive text-nowrap card-header  align-items-center ">
                                <table id="ConvertTable" class="table table-bordered table-hover colorful-table">

                                    <?php

                                    if ($type != '') {
                                        $sqll = "SELECT * FROM  asset_type where id='$type' order by id asc";
                                    } else {
                                        $sqll = "SELECT * FROM  asset_type  order by id asc";
                                    }

                                    $resultt = mysqli_query($conn, $sqll);
                                    while ($row = mysqli_fetch_array($resultt)) {


                                        ?>





                                        <thead>

                                            <tr style="height:45px">
                                                <th colspan="9"
                                                    style="font-weight:bold;text-align:center;text-transform:uppercase;font-size:larger">
                                                    <?php echo $row['type']; ?>
                                                </th>
                                            </tr>

                                        </thead>
                                        <?php

                                        if ($group_name != '') {
                                            $sqll2 = "SELECT * FROM  asset_group  where  id='$group_name' and  type='" . $row['id'] . "'  order by id asc ";

                                        } else {
                                            $sqll2 = "SELECT * FROM  asset_group  where   type='" . $row['id'] . "'  order by id asc ";
                                        }
                                        $resultt2 = mysqli_query($conn, $sqll2);
                                        while ($row2 = mysqli_fetch_array($resultt2)) {


                                            ?>
                                            <thead>

                                                <tr style="height:45px">
                                                    <th colspan="9"
                                                        style="font-weight:bold;text-align:left;text-transform:uppercase;font-size:larger">
                                                        <?php echo $row2['group_name']; ?>
                                                    </th>
                                                </tr>

                                               <th >S.No</th>
                                  <th >Rec.No</th>
                                  <th nowrap>Product&nbsp;Name</th> 
                                  <th nowrap>Warrant&nbsp;Date</th> 
                             
                                  <th nowrap>Product No</th> 
                                  <th nowrap>Department</th>
                                  <th nowrap>Designation</th>
                                  <th nowrap>Assign</th>
                                  <th nowrap>Assign Date</th>
                                            </thead>

                                            <tbody id="myTable">
                                            <?php
                         $sno=1;
                         // LOOP TILL END OF DATA
                      $sql = " SELECT *,a.id as id,l.desig as desig,m.name as name  FROM asset_assign a  left join asset_master e on a.pro_name=e.id left join depart k on a.depart=k.id left join desi_master l on a.desig=l.id left join employee m on a.assign_to=m.id
                    order by a.id asc";
                         $result = mysqli_query($conn, $sql);
                         $count=mysqli_num_rows($result);
                         if($count>0)
                         {
                       while ($rows=mysqli_fetch_array($result))

                         {
                           
                           ?>
                           <tr style="Font-size:14px">
                    <input type="text" hidden name="cid[]" id="cid<?php echo $sno; ?>" value="<?php echo $rows['id'];?>">
                     <td ><?php echo $sno; ?></td>                                                 
                     <td><?php echo $rows['rec_no'];?></td>                          
                     <td nowrap><?php echo $rows['asset_name'];?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['warrant_date'])); ?></td>                            
                     <td><?php echo $rows['pro_no'];?></td>                          
                     <td nowrap style="font-size:12px"><?php echo $rows['depname'];?></td>                          
                     <td nowrap><?php echo $rows['desig'];?></td>                          
                     <td nowrap><?php echo $rows['name'];?></td>                          
                     <td nowrap><?php echo date('d-m-Y',strtotime($rows['assign_date'])); ?></td>                         
                                      
                                            
                         <!--  <td nowrap> 
                              <a href="pur_entry_print.php?cid=<?php echo base64_encode($rows['id']);?>" 
                            type="button" style="width:113px" class="btn btn-outline-warning" id="edit<?php echo $sno;?>">
                              <span class="ti-xs ti ti-printer me-1"></span>Print
                            </a> -->
                          
                       

                           <!--     <a  href="ajax/delpurchaseentry.php?cid=<?php echo base64_encode($rows['id']);?>"
                             type="button" data-bs-toggle="offcanvas"
                          data-bs-target="#offcanvasEcommerceCustomer"style="width:113px" 
                          class="btn btn-outline-danger"
                          id="del<?php echo $sno;?>" 
                          onclick="delpurchaseentry(del<?php echo $sno;?>.id);" >
                            <span class="ti-xs ti ti-trash me-1"></span>Delete
                         </a> 
                          </td> -->
                        </tr>
                        <?php
                  $sno++;
                         }
                      }
                         }
                    
                        }
               
                  ?>


                                    </tbody>

                                </table>


                            </div>
                        </div>



                        <div class="card-header d-flex align-items-center justify-content-between">
                            <a href="assign_report.php" class="btn btn-primary mt-4"><i
                                    class="ti ti-arrow-left me-sm-1 me-0"></i>Back</a>
                            <button onclick="PrintElem('#mydiv')" class="btn btn-warning mt-4" value="Print"><i
                                    class="ti ti-printer me-sm-1 me-0"></i>Print</button>
                            <button onClick="tableToExcel('ConvertTable')" class="btn btn-warning "><i
                                    class="ti ti-table me-sm-1 me-0"></i>Export to Excel<i
                                    class="ti ti-arrow-right me-sm-1 me-0"></i></button>

                        </div>
                    </div>

                    <!-- / Content -->



                    <div class="content-backdrop fade"></div>
                </div>
            </div>
            <!-- Content wrapper -->


        </div>
    </div>
    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?php include "footer.php"; ?>
</body>
<script src="jquery-1.4.4.min.js" type="text/javascript"></script>

<script type="text/javascript">
    var tableToExcel = (function () {
        var uri = 'data:application/vnd.ms-excel;base64,'
            , template = '<html xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:x="urn:schemas-microsoft-com:office:excel" xmlns="http://www.w3.org/TR/REC-html40"><head><!--[if gte mso 9]><xml><x:ExcelWorkbook><x:ExcelWorksheets><x:ExcelWorksheet><x:Name>{worksheet}</x:Name><x:WorksheetOptions><x:DisplayGridlines/></x:WorksheetOptions></x:ExcelWorksheet></x:ExcelWorksheets></x:ExcelWorkbook></xml><![endif]--><meta http-equiv="content-type" content="text/plain; charset=UTF-8"/></head><body><table>{table}</table></body></html>'
            , base64 = function (s) { return window.btoa(unescape(encodeURIComponent(s))) }
            , format = function (s, c) { return s.replace(/{(\w+)}/g, function (m, p) { return c[p]; }) }
        return function (table, name) {
            if (!table.nodeType) table = document.getElementById(table)
            var ctx = { worksheet: name || 'Worksheet', table: table.innerHTML }
            window.location.href = uri + base64(format(template, ctx))
        }
    })()
</script>
<script type="text/javascript">

    function PrintElem(elem) {
        Popup($(elem).html());
    }

    function Popup(data) {
        var mywindow = window.open('', 'my div', 'height=500,width=900');
        mywindow.document.write('<html><head><title></title>');
        mywindow.document.write('<style>');
        mywindow.document.write('table { width: 100%; border-collapse: collapse; margin: 20px 0; }');
        mywindow.document.write('table, th, td { border: 1px solid #000; }');
        mywindow.document.write('th, td { padding: 10px; text-align: center; }');
        mywindow.document.write('th { background-color: #f2f2f2; font-weight: bold; }');
        mywindow.document.write('tr:nth-child(even) { background-color: #f9f9f9; }');
        mywindow.document.write('</style>');
        mywindow.document.write('</head><body>');
        mywindow.document.write(data);
        mywindow.document.write('</body></html>');

        mywindow.print();
        mywindow.close();

        return true;
    }
</script>


<script>


    function get(value1, value2) {
        // alert(value1);
        //  alert(value2);



        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                r = xmlhttp.responseText;
                //alert(r);
                location.reload();
                //document.getElementById('accept_profile').innerHTML=r;


            }
        };
        xmlhttp.open("GET", "ajax/get_status.php?id=" + value1 + "&status=" + value2, true);
        xmlhttp.send();

    }
</script>