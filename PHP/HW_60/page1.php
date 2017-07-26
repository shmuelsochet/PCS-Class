<?php

    
    $title = "Home Page";
    if(!empty($_GET['color'])){
        $color = $_GET['color'];
    }
    if(!empty($_GET['font'])){
        $font = $_GET['font'];
    }

    $fonts = [
        "Abadi MT Condensed Light",
        "Aharoni",
        "Aldhabi",
        "Andalus",
        "Aparajita",
        "Arial",
        "Arial Black",
        "Calibri",
        "Calisto MT",
        "Cambria",
        "Cambria Math",
        "Candara",
        "Century Gothic",
        "Comic Sans MS",
        "Consolas",
        "Constantia",
        "Copperplate Gothic Bold",
        "Corbel",
        "Impact",
        "Trebuchet MS",
        "Verdana",
        






     ];
     
     
    
?>

<?php include "top.php" ?>

    
     <form class="form-horizontal" action="" method="get">
            <div class="form-group">
                <label for="color" class="col-sm-2 control-label">Color</label>
                <div class="col-sm-6">
                <input type="color" class="form-control" id="color" name="color" placeholder="Color"
                value="<?= $color ?>">
                </div>
            </div>

            <div class="form-group">
                 
                <label for="font" class="col-sm-2 control-label">Font</label>
                <div class="col-sm-6">
                <select class="form-control" name="font" xmultiple>
                    <?php
                        foreach($fonts as $key => $font): ?>

                    <option value="<?= $font ?>"
                        <?php if ($font === $_GET['font']) echo "selected"  ?>
                        ><?= $fonts["$key"] ?>
                    </option>
                        <?php endforeach ?>
                    <!--<option>Helvetica</option>
                    <option>Arial</option>
                    <option>Time New Roman</option>
                    <option>Comic Sans MS</option>-->
                </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Submit</button>
                </div>
            </div>    
        </form>
        <article class="container">
            <h1>Page 1</h1>
            <p> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, nemo sunt necessitatibus nam aliquam. Aspernatur, tenetur. Consequuntur consequatur alias illo at, doloremque aspernatur commodi laboriosam suscipit asperiores dolorem cumque deleniti? Neque quod, ex nisi, recusandae repellat dicta beatae distinctio, eligendi officiis esse ab unde molestiae. Repellat ad iste voluptatibus incidunt accusantium iure accusamus voluptatem corporis vel excepturi recusandae adipisci non omnis eos, officiis veritatis, architecto. Tempora beatae, accusamus dicta obcaecati! Eligendi non quae est nobis impedit, reprehenderit quis dolor iusto totam, modi sapiente similique sed voluptate praesentium aperiam alias odit ex dolorem repellat ratione saepe necessitatibus sunt quibusdam nisi. Neque illo quasi fugit eligendi iste doloribus, eius repudiandae cumque, culpa rem officiis, provident assumenda! Doloremque nihil saepe itaque, eius cupiditate cum ad tenetur accusamus soluta esse voluptatem molestias, sed animi sit facilis, illum nisi veritatis. Itaque, minima nostrum velit magnam expedita voluptates! Eaque distinctio dignissimos commodi tempore enim quas id, fugiat eveniet in reprehenderit maxime voluptatum unde nulla temporibus perspiciatis minus ex eius fugit adipisci possimus? Porro repellat numquam incidunt sit aliquid distinctio ullam doloremque animi illum. Voluptatibus, recusandae. Ut ad aliquam praesentium qui ratione laudantium distinctio optio et tempore placeat repellendus, accusamus suscipit temporibus eaque explicabo esse nostrum sunt provident aspernatur minima commodi. Dolor nemo maiores assumenda aut quia mollitia accusamus ex, reiciendis fugit corporis ullam a, delectus eaque. Ex accusantium exercitationem quidem facilis architecto repellat dolores corporis consequuntur non nam magni quas adipisci, dolorem amet atque, tempora perspiciatis nobis officiis earum quo eos id! Officia amet deleniti a, molestiae alias et harum veniam id repudiandae natus. Aut illum esse, omnis eum officia officiis aperiam ipsam, non sint fuga quas nulla distinctio dolorum, facilis ea nam repellat voluptate dolore unde! Quas aliquid a, consequuntur ullam doloribus quis incidunt, maxime consectetur minus enim atque impedit voluptates? Sunt adipisci esse debitis vel, cum ab quaerat. Ut reprehenderit tempore, maxime eum dicta natus, in ratione quidem totam quasi maiores quaerat excepturi quo ex, assumenda qui voluptates, earum ipsum itaque? Repellendus molestiae impedit doloribus voluptate unde quidem esse veniam, earum recusandae quasi velit deserunt dolores nesciunt deleniti amet ipsam temporibus. Possimus voluptates vero corporis odit atque vitae provident veritatis cupiditate consectetur repellendus hic ad tempore, temporibus magnam. Excepturi ab, eius ex earum tenetur ut distinctio harum voluptas fugit dolorem! Iusto atque nemo, id beatae maiores optio labore aperiam est ipsa fugit doloremque. Voluptatibus vitae nesciunt excepturi molestiae rem illo accusamus sapiente voluptas similique exercitationem totam ullam obcaecati quod deleniti neque facere eaque consequatur ipsum sit, beatae consequuntur. Eveniet similique cumque dolorem maiores rem itaque magnam tempore inventore perspiciatis temporibus architecto consectetur quia atque aliquid, natus molestiae doloribus ab repudiandae a adipisci at. Dolores quo provident sunt, saepe inventore neque dolorem accusamus. Earum consequuntur nam nulla doloremque alias rem maxime et similique, a placeat cum quidem cumque libero molestiae aliquid magni unde quia inventore ea quis praesentium. Repellat dicta, deleniti modi sequi fugiat labore qui ad tempora temporibus, nemo similique et ipsum ut, quo, soluta dolores adipisci earum praesentium! Hic dolores in, quo delectus praesentium minus, enim dolore dolor distinctio magnam, numquam obcaecati. Neque dolorem, illo! Aliquid numquam inventore velit laudantium fuga mollitia, quas architecto nesciunt qui, eveniet atque molestiae? Laudantium reiciendis nihil ipsam ipsum officia, recusandae aperiam assumenda, consequatur excepturi, sequi minus. Amet facere hic, sint culpa rerum excepturi vel quo rem sequi qui odit repellendus fugiat corporis nulla earum asperiores iusto est fugit veritatis consequatur dolorem. Quisquam non delectus nesciunt neque rerum vel fugiat sed. Numquam architecto, sed recusandae fugit sit eius beatae voluptas qui laudantium reiciendis voluptatem minima cupiditate labore autem deleniti et perferendis. Ullam iure velit molestias, ratione fugiat accusantium praesentium non esse harum nobis, perspiciatis reprehenderit architecto tempora voluptatibus magnam! Quam laudantium eveniet ad eos, asperiores ducimus voluptatem! Placeat tempore minima quaerat, totam ab iure hic, dignissimos pariatur velit, similique, reiciendis voluptates rerum recusandae. Placeat tempore expedita molestias nulla autem enim alias suscipit delectus ea quibusdam perspiciatis quia fugiat eaque labore, nobis atque vel molestiae veritatis aut adipisci eius magni quo debitis! Placeat commodi, enim asperiores, beatae accusamus dicta itaque laboriosam odit sequi natus quasi eaque temporibus architecto delectus dolorum excepturi doloremque facilis esse modi provident nostrum similique perferendis distinctio impedit eligendi. Aut earum rerum perspiciatis delectus molestias eos error. Perspiciatis accusantium officiis nobis, voluptate molestiae beatae illo dolor totam ad. Voluptatem quis fugit molestias officiis? Libero quaerat aut voluptates recusandae error dolor natus ipsam molestiae tenetur non quasi totam excepturi ipsum, similique velit voluptate corrupti at ullam earum reprehenderit, quo nihil. Eius hic porro, natus quas blanditiis, illo qui aut cum laborum voluptatem, corrupti assumenda, sapiente facilis alias. Deleniti ex molestias cum, odit odio saepe! Adipisci et quae dolorum similique animi nobis vel doloremque ipsa, eum eius, nisi quia aliquid fuga debitis reprehenderit veritatis, possimus. In aperiam maiores ea, animi veritatis neque ipsam delectus, eveniet sed similique. Deserunt, vel. Natus suscipit voluptates quisquam et at fugiat harum, nihil laudantium nam incidunt ipsam autem neque. Recusandae natus sed minus qui, cumque dignissimos possimus, reiciendis, ipsa consequatur, quo dolore. Sed ex eos dolorem. Sit quidem sapiente aperiam ullam, alias sunt. Ipsam similique omnis hic mollitia, quod asperiores sed at saepe quis voluptatum quas atque modi esse minus illo cupiditate voluptatem! Dolor cupiditate et fugiat assumenda, harum impedit a, rerum tenetur quo! Pariatur esse tenetur eaque maiores accusamus eveniet rerum dolorem placeat nam possimus id expedita totam facilis numquam modi amet cumque, error facere itaque quos harum sit! Expedita sed tempore voluptas ducimus odit saepe voluptatum, totam aut nihil. Praesentium incidunt possimus aperiam vitae quaerat illum. Consequatur, fugit quae atque quod voluptate aliquam ea assumenda facilis cum illo laudantium, tempora nisi, quibusdam sapiente! Culpa facere quisquam esse, praesentium est harum quia similique, ipsum fuga cumque optio laboriosam exercitationem consequuntur assumenda omnis laudantium repellendus recusandae nihil sit doloribus quidem. Fuga est vitae nihil at facilis nisi, fugiat magni id saepe tempora odit culpa quia excepturi quisquam perferendis quidem omnis. Culpa similique, officiis deserunt corrupti quam libero illo eaque. Rerum in, maiores modi doloremque asperiores hic totam incidunt reprehenderit porro excepturi nihil. Veniam!</p>
        </article>
</body>
</html>