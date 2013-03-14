<?php
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

</div>
<script type="text/javascript">

    var validator = new FormValidator('myForm', [{
            name: 'name',
            display: 'name',    
            rules: 'required'
        }, {
            name: 'fax',
            rules: 'required'
        }, {
            name: 'primaryphone',
            rules: 'primary phone',
            display: 'required'
        }, {
            name: 'location',
            display: 'location details',
            rules: 'required'
        }, {
            name: 'area[]',
            display: 'Area',
            rules: 'required'
        }, {
            name: 'contact_email',
            rules: 'valid_email'
        }, {
            name: 'otherphone',
            display: 'Other public phone',
            rules: 'required'
        }], function(errors, event) {
        if (errors.length > 0) {
            // Show the errors
//            alert ("error");
            var errorString = '';
        
        for (var i = 0, errorLength = errors.length; i < errorLength; i++) {
            errorString += errors[i].message + '<br />';
        }
        
        error_box.innerHTML = errorString;
   
           
        }
          
    });

  


</script>
</body>
</html>


