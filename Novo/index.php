<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
    <script type="text/javascript" charset="utf8" src="http://ajax.aspnetcdn.com/ajax/jQuery/jquery-1.8.2.min.js"></script>
    <link rel="stylesheet" href="dist/style.css" />
    <script src="dist/script.js" defer></script>
    <title></title>
    <script>
    </script>
</head>

<body>
    <div id="tree_view"></div>
    <script>
        let tableVersion = <?php include("responseVersion.php") ?>;
        let tableItem = <?php include("responseItem.php") ?>;

        let treeView = document.getElementById('tree_view');
        let ulBase = document.createElement('ul');
        ulBase.className = 'ulBase';

        function GenerateTreeView(tableVersion, tableItem) {
            tableVersion.forEach(version => {
                let liVersion = document.createElement('li');
                let ulChanges = document.createElement('ul');
                liVersion.innerHTML = version.VERSAO;
                ulBase.append(liVersion);
                ulBase.append(ulChanges);
                tableItem.forEach(change => {
                    if (version.ID == change.ID_CONTROLE_VERSAO) {
                        ulChanges.className = 'nested';
                        liVersion.className = 'liVersion';
                        let liChange = document.createElement('li');
                        liChange.className = 'liChange';
                        liChange.innerHTML = change.DESCRICAO;
                        ulChanges.append(liChange);
                        liVersion.append(ulChanges);
                        ulBase.append(liVersion);
                    }
                })
            });
            treeView.append(ulBase);
        }

        GenerateTreeView(tableVersion, tableItem);
    </script>
</body>

</html>