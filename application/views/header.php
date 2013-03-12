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

        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link></link>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>js/gen_validatorv4.js"></script>
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


       
    </head>
