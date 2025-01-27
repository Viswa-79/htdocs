


<script>
     $(document).ready(function(){

       $('#edit1').on('click',function(){
         
         var id = $('#id1').val();
         $.ajax({
           type:'POST',
           url:'getStaff.php',
           dataType: "json",
           data:{id:id},
           success:function(data){
                if(data.sts == 'ok'){
                    $('#id').val(data.id);  
                    $('#name').val(data.name);                 
                    $('#department').val(data.department);                 
                    $('#designation').val(data.designation);                 
                    $('#mobile').val(data.mobile);                 
                    $('#email').val(data.email);                 
                    $('#joiningdate').val(data.joiningdate);                 
                    $('#idproofnumber').val(data.idproofnumber);                 
                 //   $('#uploadidproof').val(data.uploadidproof);  
                    $('#address').val(data.address);                 
                                    
               
                }else{
                   
                    alert("User not found...");
                } 
            }
        });
    })
});
      </script> 



