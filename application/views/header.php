<?php
/*
 * The contents of this file are subject to beyond Meetings Manager Public license you may not use or change this file except in
  compliance with the License. You may obtain a copy of the License by emailing this address udsmmeetingmanager@googlegroups.com
 * @author vincent daud
  @email vincentdaudi@gmail.com
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en-US" xml:lang="en">
    <head>
        <base href ="<?php echo base_url(); ?>" />
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link></link>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
<!--        <script type="text/javascript" src="<?php echo base_url(); ?>js/validate.min.js"></script>-->
        <script type="text/javascript" src="<?php echo base_url(); ?>js/validate.js"></script>
        <link href="<?php echo base_url(); ?>css/default.css" rel="stylesheet"/>

        <script type="text/javascript">
            
                   
            $(document).ready(function()
            {
                $(".section").change(function()
                {
                    var id=$(this).val();
                    var dataString = 'id='+ id;

                    $.ajax
                    ({
                        type: "POST",
                        url: "http://localhost/form-generator/index.php/formGenerator/setSectionId/",
                        data: dataString,
                        cache: false,
                        success: function(html)
                        {
                            $(".categories").html(html);
                            
                            ///function to autoload the categories from subsection
                            $(".autoloadcat").change(function()
                            {
                                var id=$(this).val();
                                var dataString = 'catid='+ id;

                                ///if the subsection categories present load the categories
                                $.ajax
                                ({
                                    type: "POST",
                                    url: "http://localhost/form-generator/index.php/formGenerator/selectCategory/",
                                    data: dataString,
                                    cache: false,
                                    success: function(html)
                                    {
                                        $(".subcat").html(html);
                                        dataType:html;
                                    }
                                });

                            });
                            
                            
                            
                        }
                    });

                });
                
                
                
                //
                
                
                $(".events").change(function()
                {
                    var id=$(this).val();
                    var dataString = 'e_id='+ id;

                    $.ajax
                    ({
                        type: "POST",
                        url: "http://localhost/form-generator/index.php/formGenerator/selectEventsRepeat/",
                        data: dataString,
                        cache: false,
                        success: function(html)
                        {
                            $(".events_display").html(html);
                        }
                    });

                });
              
            });

        </script>
        
<!--        
        <script type="text/javascript">

function validateEmail()
{
 
   var emailID = document.myForm.contact_email.value;
   atpos = emailID.indexOf("@");
   dotpos = emailID.lastIndexOf(".");
   if (atpos < 1 || ( dotpos - atpos < 2 )) 
   {
       alert("Please enter correct email address")
       document.myForm.EMail.focus() ;
       return false;
   }
   return( true );
}

function validate()
{
   if( document.myForm.name.value == "" )
   {
     alert( "Please provide a name!" );
     document.myForm.name.focus() ;
     return false;
   }
   
   if( document.myForm.fax.value == "" )
   {
     alert( "Please provide a fax #!" );
     document.myForm.name.focus() ;
     return false;
   }
  if( document.myForm.otherphone.value == "" )
   {
     alert( "Please provide other public phone#!" );
     document.myForm.otherphone.focus() ;
     return false;
   }
   if( document.myForm.txtarea.value == "" )
   {
     alert( "Please fill the description in a textarea!" );
     document.myForm.txtarea.focus() ;
     return false;
   }
    if( document.myForm.location.value == "" )
   {
     alert( "Please provide location description" );
     document.myForm.location.focus() ;
     return false;
   }
   
   
     if( document.forms["myForm"]["area[]"].value==null||"" )
   {
     alert( "Please select atleast one region" );
     document.myForm.location.focus() ;
     return false;
   }
   
   if( document.myForm.contact_email.value == "" )
   {
     alert( "Please provide a public email!" );
     document.myForm.contact_email.focus() ;
     return false;
   }else{
     // Put extra check for data format
     var ret = validateEmail();
     if( ret == false )
     {
          return false;
     }
   }
   
  
   if( document.myForm.Country.value == "-1" )
   {
     alert( "Please provide your country!" );
     return false;
   }
   return( true );
}
//
</script>
        -->
        


       
    </head>
