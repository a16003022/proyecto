<style>

    .cssbuttons-io-button {
        background: #A370F0;
        color: white;
        font-family: inherit;
        padding: 0.35em;
        padding-left: 1.2em;
        font-size: 17px;
        font-weight: 500;
        border-radius: 0.9em;
        border: none;
        letter-spacing: 0.05em;
        display: flex;
        align-items: center;
        box-shadow: inset 0 0 1.6em -0.6em #714da6;
        overflow: hidden;
        position: relative;
        height: 2.8em;
        padding-right: 3.3em;
    }

    .cssbuttons-io-button .icon {
    background: white;
    margin-left: 1em;
    position: absolute;
    display: flex;
    align-items: center;
    justify-content: center;
    height: 2.2em;
    width: 2.2em;
    border-radius: 0.7em;
    box-shadow: 0.1em 0.1em 0.6em 0.2em #7b52b9;
    right: 0.3em;
    transition: all 0.3s;
    }

    .cssbuttons-io-button:hover .icon {
    width: calc(100% - 0.6em);
    }

    .cssbuttons-io-button .icon svg {
    width: 1.1em;
    transition: transform 0.3s;
    color: #7b52b9;
    }

    .cssbuttons-io-button:hover .icon svg {
    transform: translateX(0.1em);
    }

    .cssbuttons-io-button:active .icon {
    transform: scale(0.95);
    }

    .form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    max-width: 350px;
    background-color: #fff;
    padding: 20px;
    border-radius: 20px;
    position: relative;
    }

    .title {
    font-size: 28px;
    color: #9162DD !important;;
    font-weight: 600;
    letter-spacing: -1px;
    position: relative;
    display: flex;
    align-items: center;
    padding-left: 30px;
    }

    .title::before,.title::after {
    position: absolute;
    content: "";
    height: 16px;
    width: 16px;
    border-radius: 50%;
    left: 0px;
    background-color: #9162DD !important;;
    }

    .title::before {
    width: 18px;
    height: 18px;
    background-color: #9162DD !important;;
    }

    .title::after {
    width: 18px;
    height: 18px;
    animation: pulse 1s linear infinite;
    }

    .message, .signin {
    color: rgba(88, 87, 87, 0.822);
    font-size: 14px;
    }

    .signin {
    text-align: center;
    }

    .signin a {
    color: royalblue;
    }

    .signin a:hover {
    text-decoration: underline #9162DD !important;;
    }

    .flex {
    display: flex;
    width: 100%;
    gap: 6px;
    }

    .form label {
    position: relative;
    }

    .form label .input {
    width: 100%;
    padding: 5px 5px 10px 5px;
    outline: 0;
    border: 1px solid rgba(105, 105, 105, 0.397);
    border-radius: 10px;
    }

    .form label .input + span {
    position: absolute;
    left: 10px;
    top: 15px;
    color: grey;
    font-size: 0.9em;
    cursor: text;
    transition: 0.3s ease;
    }

    .form label .input:placeholder-shown + span {
    top: 15px;
    font-size: 0.9em;
    }

    .form label .input:focus + span,.form label .input:valid + span {
    top: 30px;
    font-size: 0.7em;
    font-weight: 600;
    }

    .form label .input:valid + span {
    color: green;
    }

    .submit {
    border: none;
    outline: none;
    background-color: #9162DD !important;
    padding: 10px;
    border-radius: 10px;
    color: #fff;
    font-size: 16px;
    transform: .3s ease;
    }

    .submit:hover {
    background-color: rgb(56, 90, 194);
    }

    @keyframes pulse {
    from {
        transform: scale(0.9);
        opacity: 1;
    }

    to {
        transform: scale(1.8);
        opacity: 0;
    }
    }

    .listas{
        border-right: solid #9162DD !important;
    }

    /* ul {
        display: flex;
        flex-direction: column;
        gap: 10px;
    } */
    .li-listas{
        list-style:none;
        color: red;
        
    }

    .li-listas:hover{
        background-color: #E5E8E8 !important;
    }

    .list-group-item:first-child {
    border-top-left-radius: 7px;
    border-top-right-radius: 7px;
    }
    .list-group-item:first-child {
        border-top-left-radius: .25rem;
        border-top-right-radius: .25rem;
    }
    a.list-group-item {
        padding-top: .87rem;
        padding-bottom: .87rem;
    }
    a.list-group-item, .list-group-item-action {
        transition: all .25s;
        color: #606975;
        font-weight: 500;
    }
    .with-badge {
        position: relative;
        padding-right: 3.3rem;
    }
    .list-group-item {
        border-color: #e1e7ec;
        background-color: #fff;
        text-decoration: none;
    }
    .list-group-item {
        position: relative;
        display: block;
        padding: .75rem 1.25rem;
        margin-bottom: -1px;
        background-color: #fff;
        border: 1px solid rgba(0,0,0,0.125);
    }

    .shopping-cart,
    .wishlist-table,
    .order-table {
        margin-bottom: 20px
    }

    .shopping-cart .table,
    .wishlist-table .table,
    .order-table .table {
        margin-bottom: 0
    }

    .shopping-cart .btn,
    .wishlist-table .btn,
    .order-table .btn {
        margin: 0
    }

    .shopping-cart>table>thead>tr>th,
    .shopping-cart>table>thead>tr>td,
    .shopping-cart>table>tbody>tr>th,
    .shopping-cart>table>tbody>tr>td,
    .wishlist-table>table>thead>tr>th,
    .wishlist-table>table>thead>tr>td,
    .wishlist-table>table>tbody>tr>th,
    .wishlist-table>table>tbody>tr>td,
    .order-table>table>thead>tr>th,
    .order-table>table>thead>tr>td,
    .order-table>table>tbody>tr>th,
    .order-table>table>tbody>tr>td {
        vertical-align: middle !important
    }

    .shopping-cart>table thead th,
    .wishlist-table>table thead th,
    .order-table>table thead th {
        padding-top: 17px;
        padding-bottom: 17px;
        border-width: 1px
    }

    .shopping-cart .remove-from-cart,
    .wishlist-table .remove-from-cart,
    .order-table .remove-from-cart {
        display: inline-block;
        color: #ff5252;
        font-size: 18px;
        line-height: 1;
        text-decoration: none
    }

    .shopping-cart .count-input,
    .wishlist-table .count-input,
    .order-table .count-input {
        display: inline-block;
        width: 100%;
        width: 86px
    }

    .shopping-cart .product-item,
    .wishlist-table .product-item,
    .order-table .product-item {
        display: table;
        width: 100%;
        min-width: 150px;
        margin-top: 5px;
        margin-bottom: 3px
    }

    .shopping-cart .product-item .product-thumb,
    .shopping-cart .product-item .product-info,
    .wishlist-table .product-item .product-thumb,
    .wishlist-table .product-item .product-info,
    .order-table .product-item .product-thumb,
    .order-table .product-item .product-info {
        display: table-cell;
        vertical-align: top
    }

    .shopping-cart .product-item .product-thumb,
    .wishlist-table .product-item .product-thumb,
    .order-table .product-item .product-thumb {
        width: 130px;
        padding-right: 20px
    }

    .shopping-cart .product-item .product-thumb>img,
    .wishlist-table .product-item .product-thumb>img,
    .order-table .product-item .product-thumb>img {
        display: block;
        width: 100%
    }

    @media screen and (max-width: 860px) {
        .shopping-cart .product-item .product-thumb,
        .wishlist-table .product-item .product-thumb,
        .order-table .product-item .product-thumb {
            display: none
        }
    }

    .shopping-cart .product-item .product-info span,
    .wishlist-table .product-item .product-info span,
    .order-table .product-item .product-info span {
        display: block;
        font-size: 13px
    }

    .shopping-cart .product-item .product-info span>em,
    .wishlist-table .product-item .product-info span>em,
    .order-table .product-item .product-info span>em {
        font-weight: 500;
        font-style: normal
    }

    .shopping-cart .product-item .product-title,
    .wishlist-table .product-item .product-title,
    .order-table .product-item .product-title {
        margin-bottom: 6px;
        padding-top: 5px;
        font-size: 16px;
        font-weight: 500
    }

    .shopping-cart .product-item .product-title>a,
    .wishlist-table .product-item .product-title>a,
    .order-table .product-item .product-title>a {
        transition: color .3s;
        color: #374250;
        line-height: 1.5;
        text-decoration: none
    }

    .shopping-cart .product-item .product-title>a:hover,
    .wishlist-table .product-item .product-title>a:hover,
    .order-table .product-item .product-title>a:hover {
        color: #0da9ef
    }

    .shopping-cart .product-item .product-title small,
    .wishlist-table .product-item .product-title small,
    .order-table .product-item .product-title small {
        display: inline;
        margin-left: 6px;
        font-weight: 500
    }

    .wishlist-table .product-item .product-thumb {
        display: table-cell !important
    }

    @media screen and (max-width: 576px) {
        .wishlist-table .product-item .product-thumb {
            display: none !important
        }
    }

    .badge.badge-primary {
        background-color: #0da9ef;
    }
    .with-badge .badge {
        position: absolute;
        top: 50%;
        right: 1.15rem;
        -webkit-transform: translateY(-50%);
        -ms-transform: translateY(-50%);
        transform: translateY(-50%);
    }
    .list-group-item i {
        margin-top: -4px;
        margin-right: 8px;
        font-size: 1.1em;
    }
    
    footer{
    position: fixed;
    left: 0;
    bottom: 0;
    background-color: #fff;
  }

  .tablalistado{
    overflow:hidden;
  }


</style>

<section style="padding-top: 15vh; height: 95vh; ">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="stars" style="text-align:center;"><?= $titulo; ?></h1>
            </div>
        </div>
        <!-- <button class="cssbuttons-io-button" data-bs-toggle="modal" data-bs-target="#exampleModal"> Crear Lista
            <div class="icon">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M11 11V5h2v6h6v2h-6v6h-2v-6H5v-2z"></path></svg>
            </div>
        </button> -->

            <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                <form class="form m-auto" action="<?php echo base_url('/crearLista'); ?>" method="post">
                    <p class="title">Crea una nueva lista</p>
                    <p class="message">Nombre de la lista:</p>
                <div class="flex">
                    <label>
                        <input required="" placeholder="Lista de compras" type="nombre" class="form-control" id="nombre" name="nombre" value="<?= set_value('nombre') ?>">
                    </label>
                </div>
                <button class="submit">Crear lista</button>
            </div>
            
                </form>
                </div>
                </div>
            </div>
        </div>    

            <div class="container" style="padding-bottom: 15vh;">
                        <div class="padding-top-2x mt-2 hidden-lg-up"></div>
                            <div class="table-responsive wishlist-table margin-bottom-none">
                                <table id="tabla-ejemplo" class="display table table-hover table-bordered tablalistado">
                                    <thead>
                                        <tr>
                                            <th>Productos en la lista</th>
                                            <th class="text-center">
                                                <form action="<?php echo base_url('/lista'); ?>" method="POST">
                                                <input id="idUsuario" name="idUsuario" type="hidden" value=<?php echo $_SESSION['id']?>>             
                                                <button type="submit" class="btn btn-sm btn-outline-danger">Limpiar Lista</button>
                                                </form>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        foreach($lista as $dat){
                                            echo "<tr>";
                                            echo "<td>";
                                                echo "<div class='product-item'>";
                                                    echo "<a class='product-thumb' href='#'><img src='".base_url()?>/imagenes/<?php echo $dat['img']."' alt='Product'></a>";
                                                    echo "<div class='product-info'>";
                                                        echo "<h4 class='product-title'><a href='#'>".$dat['nombre']."</a></h4>";
                                                        echo "<div class='text-lg text-medium text-muted'> $".$dat['precio']."</div>";
                                                    echo "</div>";
                                                echo "</div>";
                                                    echo "<td>";
                                                    echo "<div class='row'>";
                                                    echo "<div class='col-6'>";
                                                    echo "<form method='POST' action='".base_url()."/eliminarProductoLista'>";
                                                    echo "<input type='hidden' name='idProducto' value='".$dat["idProducto"]."'>";
                                                    echo "<button type='submit' style='float: right;'class='btn btn-danger btn-sm btn-jumbotron'><i class='fa fa-trash'></i></button>";
                                                    echo "</form>";
                                                    echo "</div>";

                                                    echo "<div class='col-6'>";
                                                    echo "<form method='POST' action='".base_url()."/catalogoPlayeras'>";
                                                    echo "<input type='hidden' name='idProducto' value='".$dat["idProducto"]."'>";
                                                    echo "<input type='hidden' name='nombre' value='".$dat["nombre"]."'>";
                                                    echo "<input type='hidden' name='precio' value='".$dat["precio"]."'>";
                                                        $prodAñadido = false; 
                                                        foreach($carrito as $prod):
                                                        if ($prod["idProducto"] == $dat["idProducto"]){
                                                            $prodAñadido = true;
                                                            break;
                                                        }
                                                        endforeach;
                                                        if ($prodAñadido){ 
                                                        echo "<button type='submit' class='btn btn-primary btn-sm btn-jumbotron' disabled><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bag-check-fill' viewBox='0 0 16 16'>
                                                        <path fill-rule='evenodd' d='M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0zm-.646 5.354a.5.5 0 0 0-.708-.708L7.5 10.793 6.354 9.646a.5.5 0 1 0-.708.708l1.5 1.5a.5.5 0 0 0 .708 0l3-3z'/>
                                                        </svg></button>";
                                                        }else{
                                                        echo "<button type='submit' class='btn btn-primary btn-sm btn-jumbotron'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-bag' viewBox='0 0 16 16'>
                                                        <path d='M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z'/>
                                                        </svg></button>";
                                                        } 
                                                    echo "</form>";
                                                    echo "</div>";

                                                    echo "</td>";
                                                    
                                                echo "</td>";
                                                echo "</tr>";
                                             }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
            </div>
    </div>
   
</section>


<script type="text/javascript">
      $(document).ready(function() {
        $('#tabla-ejemplo').DataTable({
            pageLength : 3,
            lengthMenu: [[3,5, 10, 20, -1], [3,5, 10, 20, 'Todos']],
          "language": {
            "url": "//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json"
        }
        });
      });
</script>

