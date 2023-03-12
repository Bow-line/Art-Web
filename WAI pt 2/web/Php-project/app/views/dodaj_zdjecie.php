<form  action="<?php echo Resources::route('galeria/wyslij')?>" method="POST" enctype="multipart/form-data">
    Tytuł:
    <input type="text" name="tytul" placeholder="Tytul" required><br>
    Autor:
    <input type="text" name="autor" placeholder="Autor" required ><br>
    Znak wodny:
    <input type="text" name="znak" placeholder="Znak wodny" required><br>
    <input type="file" name="file" required ><br>
    <button type="submit" name="submit">Wyślij</button>
</form>
