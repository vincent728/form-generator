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
        echo anchor('mastersearch/index/',$title=img(array('src'=>'icons/gnome-search.png','title'=>'create search forms')));
        ?>
    </li>
    <li>
        <?php
        echo anchor('mastersearch/listofcreatedsearchforms/',$title=img(array('src'=>'icons/search.png','title'=>'list of search forms')));
        ?>
    </li>
    <li>
        <?php
        echo anchor('mastersearch/loadsearchbox/',$title=img(array('src'=>'icons/search-1.png','title'=>'search')));
        ?>
    </li>
     <li>
        <?php
        echo anchor('formGenerator/loadInputs/',$title=img(array('src'=>'icons/cog.png','title'=>'inputs manager')));
        ?>
    </li>
    
</ul>