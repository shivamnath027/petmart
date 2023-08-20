<!--restaurent details-->     
   
<div class="card">
    <div class="card-content">  
<table class="highlight">
    <tr>
       <td>
       <strong > USERNAME:</strong> 
       </td>  
       <td class="black-text" >
       <?php
          echo  $_SESSION["uname"]; 
       ?>       
       </td>      
     </tr> 
    <tr>
       <td>
       <strong > RESTAURENT ADDRESS:</strong> 
       </td>  
       <td >
       <?php
          echo  $_SESSION["rest_addr"]; 
       ?>       
       </td>      
     </tr> 
    <tr>
       <td>
       <strong > CONTACT:</strong> 
       </td>  
       <td >
       <?php
          echo  $_SESSION["phone"]; 
       ?>       
       </td>      
    </tr> </table>   
    </div>
</div>  
   