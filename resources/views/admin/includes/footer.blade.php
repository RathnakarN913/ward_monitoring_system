<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <!--<script>document.write(new Date().getFullYear())</script> -->
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end  d-sm-block">
                    Designed & Developed by <a href="https://vmaxindia.com/">VMAX</a>
                </div>
            </div>
        </div>
    </div>
</footer>

<script>
    function exportTableToExcel(type, tableID, filename = '') {
            if (type == 'xls') {
                var downloadLink;
                var dataType = 'application/vnd.ms-excel';
                var tableSelect = document.getElementById(tableID);
                var tableHTML = tableSelect.outerHTML.replace(/ /g, '%20');

                // Specify file name

                filename = filename ? filename + '.xls' : 'excel_data.xls';


                // Create download link element
                downloadLink = document.createElement("a");

                document.body.appendChild(downloadLink);

                if (navigator.msSaveOrOpenBlob) {
                    var blob = new Blob(['\ufeff', tableHTML], {
                        type: dataType
                    });
                    navigator.msSaveOrOpenBlob(blob, filename);
                } else {
                    // Create a link to the file
                    downloadLink.href = 'data:' + dataType + ', ' + tableHTML;

                    // Setting the file name
                    downloadLink.download = filename;

                    //triggering the function
                    downloadLink.click();
                }

            } else {
                var sheet = XLSX.utils.table_to_sheet(document.getElementById(tableID));
                var csv = XLSX.utils.sheet_to_csv(sheet);
                var filename = filename ? filename + '.csv' : 'excel_data.csv';

                var blob = new Blob([csv, tableHTML], {
                    type: 'text/csv'
                });

                if (navigator.msSaveBlob) { // IE 10+
                    navigator.msSaveBlob(blob, filename);
                } else {
                    var link = document.createElement("a");
                    if (link.download !== undefined) { // feature detection
                        // Browsers that support HTML5 download attribute
                        var url = URL.createObjectURL(blob);
                        link.setAttribute("href", url);
                        link.setAttribute("download", filename);
                        link.style.visibility = 'hidden';
                        document.body.appendChild(link);
                        link.click();
                        document.body.removeChild(link);
                    } else {
                        // Browsers that do not support HTML5 download attribute
                        alert(
                            'Your browser does not support downloading CSV files. Please use a different browser or download the file manually.'
                            );
                    }
                }
            }

        }
</script>
