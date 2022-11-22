<?php
    session_start();
    include "../model/connection.php";

    include "../admin/page/header.php";
    include "../admin/page/nav.php";
    if(isset($_GET['act'])){
        $act = $_GET['act'];
        switch ($act) {
            case 'contact':
                include "../admin/page/contact.php";
                break;

            case 'page_dmnv':
                include "StaffCate/index.php";
                break;
    
            case 'page_add_dmnv':
                include "StaffCate/add.php";
                break;
    
            case 'page_edit_dmnv':
                include "StaffCate/edit.php";
                break;

            case 'page_dsnv':
                include "Staff/index.php";
                break;

            case 'page_addnv':
                include "Staff/add.php";
                break;

            case 'page_editnv':
                include "Staff/edit.php";
                break;

            case 'page_loaidv':
                include "DichVuType/index.php";
                break;

            case 'page_add_loaidv':
                include "DichVuType/add.php";
                break;

            case 'page_edit_loaidv':
                include "DichVuType/edit.php";
                break;

            case 'page_dsdv':
                include "DichVu/index.php";
                break;

            case 'page_add_dsdv':
                include "DichVu/add.php";
                break;

            case 'page_edit_dsdv':
                include "DichVu/edit.php";
                break;
            
            case 'page_dskh':
                include "Customer/index.php";
                break;

            case 'page_add_dskh':
                include "Customer/add.php";
                break;

            case 'page_edit_dskh':
                include "Customer/edit.php";
                break;

            case 'page_dscart':
                include "Cart/index.php";
                break;

            case 'page_add_dscart':
                include "Cart/add.php";
                break;

            case 'page_edit_dscart':
                include "Cart/edit.php";
                break;

            case 'page_dsbill':
                include "Bill/index.php";
                break;
    
            // case 'page_add_dscart':
            //     include "Cart/add.php";
            //     break;
    
            case 'page_edit_dsbill':
                include "Bill/edit.php";
                break;

            default:
                include "../admin/page/home.php";
                break;
        }
    }else {
        include "../admin/page/home.php";
    }
    include "../admin/page/footer.php";
?>