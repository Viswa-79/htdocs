<?php
include "../config.php";
if(!empty($_GET['id']))
{
   
    //get user data from the database
    ?>
    <table class="table table-border border-top">
    <thead class="border-bottom">
        <tr>
          <th style="width:50px">#</th>
          <th>Size</th>
          <th >Quantity</th>
        </tr>
      </thead>
      <tbody>

      <?php
      $sno=1;
      	$sql1 = "SELECT * FROM sizegroup where sizegrp_id='".$_GET['id']."' order by id asc";
          $result1 = mysqli_query($conn, $sql1);
          while($rw1 = mysqli_fetch_array($result1)){
        ?>
             <tr>
             <td  style="padding: 0.3rem;width:60px">
      <div align="center"><?php echo $sno;?></div>
</td>

<td style="padding: 0.3rem;width:300px">
              
               <select name="sizes[]" id="sizes[]" class="select form-select" data-allow-clear="true">
    
    <option value="">Select</option>
<?php 
$sql = "SELECT * FROM size order by id asc";
$result = mysqli_query($conn, $sql);
while($rw = mysqli_fetch_array($result))
{ ?>
<option <?php if($rw1['size']==$rw['id']){ ?> Selected <?php } ?> value="<?php echo $rw['id'];?>"><?php echo $rw['size'];?></option>
<?php } ?>
  </select>
      
     </td>
    
   <td style="padding: 0.3rem;">
      <input style="text-align:right;"
                         type="number"
                         class="form-control"
                         id="qty<?php echo $i?>"
                         name="qty[]"
                         onKeyDown="ee1(this.id);"/>

     </td>
     
                     </tr>
            
              
              <?php
              $sno++;
      }
      ?>                 
      </tbody>
    </table>
    <?php
}
?>

