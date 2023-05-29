<html>
    <header>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Fcul_2HandCloth</title>

    <!-- Navbar (sit on top) -->
    <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
            <a href="../home.html" class="w3-bar-item w3-button"><img src="logo.png" height="30"
                    alt="Logo"><b>FCUL</b>2HandCloth</a>

            <!-- Float links to the right. Hide them on small screens -->
            <div class="w3-right w3-hide-small">
                <a href="../aboutus.html" class="w3-bar-item w3-button">About Us</a>
                <a href="../login.html" class="w3-bar-item w3-button">Login/Signup</a>
            </div>
    </header>
    <body>

        
        <br><br><br><br>
        <h3><b>Utilizadores<b></h3>
        <?php include 'dados.php';?>


        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Filter Results</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr style='background-color: #AFE1AF'>
                                    <th>Nome</th>
                                    <th>Password</th>
                                    <th>Email</th>
                                    <th>Genero</th>    
                                    <th>Data de Nascimento</th>    
                                    <th>Morada</th>    
                                    <th>localidade</th>    
                                    <th>telefone</th>    
                                    <th>Código Postal</th>    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include "abreconexao.php";
                                    if(isset($_GET['search']))
                                    {
                                        $filtervalues = $_GET['search'];
                                        $query = "SELECT * FROM registos WHERE CONCAT(nome,passwd,genero,data_nascimento,morada,localidade,telefone,email,codigo_postal) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['nome']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['passwd']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['email']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['genero']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['data_nascimento']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['morada']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['localidade']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['telefone']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['codigo_postal']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="8">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }

                                    include ""
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <br><br><br><br>


        <h3><b>Produtos<b></h3>
        <?php include 'dados_produtos.php';?>


        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Filter Products</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search_p" required value="<?php if(isset($_GET['search_p'])){echo $_GET['search_p']; } ?>" class="form-control" placeholder="Search Product">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr style='background-color: #AFE1AF'>
                                    <th>ID</th>
                                    <th>Titulo</th>
                                    <th>Descrição</th>
                                    <th>Categoria</th>    
                                    <th>Tipo</th>    
                                    <th>Tamanho</th>    
                                    <th>Marca</th>    
                                    <th>Estado</th>    
                                    <th>Preço</th>
                                    <th>photo_name</th>    
                                    <th>photo_tmp</th>
                                    <th>Vendedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include "abreconexao.php";
                                    if(isset($_GET['search_p']))
                                    {
                                        $filtervalues = $_GET['search_p'];
                                        $query = "SELECT * FROM clothes_listings WHERE CONCAT(id, title, description, category, type, size, brand, state, price, photo_name, photo_tmp, nome) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items)
                                            {
                                                ?>
                                                <tr>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['id']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['title']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['description']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['category']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['type']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['size']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['brand']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['state']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['price']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['photo_name']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['photo_tmp']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items['nome']; ?></td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="8">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }

                                    include ""
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>




        <br><br><br><br>
    
        <h3><b>Historico de Vendas<b></h3>                            
        <?php include 'dados_historico.php';?>


        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Filter Results</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search_h" required value="<?php if(isset($_GET['search_h'])){echo $_GET['search_h']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr style='background-color: #AFE1AF'>
                                    <th>ID</th>
                                    <th>Produto ID</th>
                                    <th>Comprador</th>
                                    <th>Vendedor</th>    
                                    <th>Data de Venda</th>     
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include "abreconexao.php";
                                    if(isset($_GET['search_h']))
                                    {
                                        $filtervalues = $_GET['search_h'];
                                        $query = "SELECT * FROM historico_vendas WHERE CONCAT(id, produto_id, comprador_id, vendedor_id, data_venda) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);

                                        if(mysqli_num_rows($query_run) > 0)
                                        {
                                            foreach($query_run as $items_h)
                                            {
                                                ?>
                                                <tr>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items_h['id']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items_h['produto_id']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items_h['comprador_id']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items_h['vendedor_id']; ?></td>
                                                    <td style='border: 2px solid #ddd; padding: 8px;'><?= $items_h['data_venda']; ?></td>
        
                                                </tr>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="8">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }

                                    include ""
                                ?>
                            </tbody>
                        </table>
                        <br><br>

                        

                    </div>
                </div>
            </div>
        </div>
        </div>
        <br><br>
        <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                        <h4>Filtrar número de vendas por data</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search_data" required value="<?php if(isset($_GET['search_data'])){echo $_GET['search_data']; } ?>" class="form-control" placeholder="Search data">
                                        <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr style='background-color: #AFE1AF'>
                                    <th>Número de vendas</th>    
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    include "abreconexao.php";
                                    if(isset($_GET['search_data']))
                                    {
                                        $filtervalues = $_GET['search_data'];
                                        $query = "SELECT * FROM historico_vendas WHERE CONCAT(id, produto_id, vendedor_id, data_venda) LIKE '%$filtervalues%' ";
                                        $query_run = mysqli_query($conn, $query);
                                        $result = mysqli_num_rows($query_run);
                                        if($result > 0)
                                        {
                                            
                                        
                                            ?>
                                            <tr>
                                                <td style='border: 2px solid #ddd; padding: 8px;'><?= $result ?></td>
                        
                                            </tr>
                                            <?php
                                            
                                        }
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="8">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }

                                    include ""
                                ?>
                            </tbody>
                        </table>
                        <br><br>

                        

                    </div>
                </div>
            </div>
        </div>
        </div>
        <br>
        <h3><b>Número de compras por utilizador<b></h3>
        <?php include 'conta_compras.php';?>
        
        <br>
        <h3><b>Número de vendas por utilizador<b></h3>
        <?php include 'conta_vendas.php';?> 

        <br>
    </body>

</html>