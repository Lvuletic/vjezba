<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 01/03/15
 * Time: 10:07
 */

class PregledController extends \Phalcon\Mvc\Controller
{
    public function indexAction()
    {
        /*if ($this->request->isPost()==true)
        {
            echo "da";
            if ($this->request->isAjax()==true)
            {
                echo "takodjer da";
            }
        }
        else echo "ne";
        $sifra = 5;
        $sifra = $this->request->getPost("sifra");
        echo $sifra;
        echo "gfdg";
        echo $this->request->getPost("sifra");*/
    }

    public function izracunAction()
    {
        ?>
        <div id="scroll2">
            <table id="stavke" border="1">

                <tr>
                    <th>Sifra stavke</th>
                    <th>Sifra artikla</th>
                    <th>Naziv artikla</th>
                    <th>Ukupna cijena</th>
                </tr>
                <?php
                $sifra = $this->request->getPost("stavkaN");
                $stavke = Stavka::find("sifra_N='$sifra'");
                foreach($stavke as $stavka)
                {
                    ?>
                    <tr>
                        <td><?php echo $stavka->sifra_S?></td>
                        <td><?php echo $stavka->sifra_N?></td>
                        <td><?php echo $stavka->naziv_A?></td>
                        <td><?php echo $stavka->ukupna_cijena?></td>
                    </tr>
                <?php

                }
                ?>
            </table>

        </div>
    <?php


    }
}
