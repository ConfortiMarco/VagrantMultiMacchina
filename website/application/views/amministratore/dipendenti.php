<h3>Benvenuto <strong><?php echo $_SESSION['nome'] . " " .$_SESSION['cognome']?></strong></h3>
<h4>Aggiungi Dipendente</h4>
<a class="btn btn-success" href="<?php echo URL?>amministratore/creaDipendente">Crea Dipendente</a>
<br>
<h3>Tutti i dipendenti</h3>
<table class="table table-striped">
    <thead style="background-color: #ddd; font-weight: bold;">
    <tr>
        <td>#</td>
        <td>Nome</td>
        <td>Cognome</td>
        <td>Data Nascita</td>
        <td>Email</td>
        <td>Salario Orario</td>
        <td>Password</td>
        <td>Modifica</td>
        <td>Cancella</td>
    </tr>
    </thead>
    <tbody>
    <?php $numero = 0;foreach ($utenti as $utente):?>
        <tr>
            <form action="<?php echo URL?>amministratore/modificaDipendente" method="post">
                <input type="hidden" value="<?php echo $utente['id'];?>" name="id">
                <input type="hidden" name="token" value="<?php echo $_SESSION['token'] ?? '' ?>">
                <td><strong><?php echo $numero+1?></strong></td>
                <td><input class="form-control" value="<?php echo $utente['nome']?>" name="nome"></td>
                <td><input class="form-control" value="<?php echo $utente['cognome']?>" name="cognome"></td>
                <td><input class="form-control" value="<?php echo $utente['data_nascita']?>" type="date" name="data_nascita"> </td>
                <td><input class="form-control" value="<?php echo $utente['email']?>" type="email" readonly></td>
                <td><input class="form-control" value="<?php echo $utente['salario_orario']?>" type="number" name="salario_orario"> </td>
                <td><input class="form-control" value="" type="password" name="password"></td>
                <td><button class="btn btn-warning" type="submit"><i class="fas fa-edit"></i></button></td>
                <td><a class="btn btn-danger" href="<?php echo URL?>amministratore/cancellaUtente/<?php echo $utente['id']?>"><i class="fas fa-trash"></i></a></td>
            </form>
        </tr>
        <?php $numero++;endforeach;?>
    </tbody>
</table>