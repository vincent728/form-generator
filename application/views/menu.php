<ul>
    <li>
        <?php
        echo anchor('formGenerator/index/',$title=img(array('src'=>'icons/form_add.png','title'=>'create form')));
        ?>
    </li>
    <li>
        <?php
        echo anchor('formGenerator/listOfCreatedForms/',$title=img(array('src'=>'icons/forms.png','title'=>'forms')));
        ?>
    </li>
     <li>
        <?php
        echo anchor('formGenerator/loadInputs/',$title=img(array('src'=>'icons/cog.png','title'=>'inputs manager')));
        ?>
    </li>
    
</ul>
