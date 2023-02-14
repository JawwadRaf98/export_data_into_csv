* Add export btn with specific type name in get parameter

<a class="downlaodBtn" href="{url of your projecy}/exportDataIntoCSV.php?type=viewPatients">Export</a>

* Add CSS

.downlaodBtn {
    text-decoration: none;
    padding: 0.7rem 1.5rem;
    background: #3c3b3b;
    border-radius: 5px;
    color: #fff;
    font-weight: 600;
}

.downlaodBtn:hover {
    text-decoration: none;
    color: #fff;
    background: #000;
}

*Set query against your type parameter in Export data file