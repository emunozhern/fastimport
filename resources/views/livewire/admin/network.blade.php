<div>
    {{-- <x-slot name="header"> --}}
        <x-page-header title="Network"></x-page-header>
        {{-- </x-slot> --}}

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">

                    <div class="portlet blue box">
                        <div class="portlet-body">
                            <div id="chart" class="orgChart" style="overflow: auto;"></div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<script>
    function loadjson() {
        console.log("run")
        var data = TAFFY([]);
        process_data(@php echo $data; @endphp);
    }

    function process_data(dataa) {
        var datab = TAFFY(dataa);
        data = datab;
        data({
            "parent": ""
        }).each(function(record, recordnumber) {
            loops(record);
        });
        $("<ul>", {
            "id": "org",
            "style": "float:right;",
            html: items.join("")
        }).appendTo("body");
        init_tree();
    }
    var items = [];

    function loops(root) {

        if (root.parent == "") {
            items.push("<li class='unic" + root.id + " root' id='" + root.name +
                "'><div class='person'><div class='person_img'><img class='img-tree' src='" + root
                .profile_photo_url + "'></div>  <div class='person_title label_node'>" +
                root.id + "</br></div></div><div class='details'><p><strong>Email:</strong>" + root
                .email + "</p></div>");
        } else {
            items.push("<li class='child unic" + root.id + "' id='" + root.name +
                "'><div class='person'><div class='person_img'><img class='img-tree' src='" + root
                .profile_photo_url + "'></div>  <div class='person_title label_node'>" +
                root.id + "</br></div></div><div class='details'><p><strong>Email:</strong>" + root
                .email + "</p></div>");
        }
        var c = data({
            "parent": root.id
        }).count();
        if (c != 0) {
            items.push("<ul>");
            data({
                "parent": root.id
            }).each(function(record, recordnumber) {
                loops(record);
            });
            items.push("</ul></li>");
        } else {
            items.push("</li>");
        }
    }

</script>

<script>
    function init_tree() {
        var opts = {
            chartElement: '#chart',
            dragAndDrop: true,
            expand: true,
            control: true,
            rowcolor: false
        };
        $("#chart").html("");
        $("#org").jOrgChart(opts);
    }

    function scroll() {
        $(".node").click(function() {
            $("#chart").scrollTop(0)
            $("#chart").scrollTop($(this).offset().top - 140);
        })
    }
    $(document).ready(function() {
        loadjson();

        scroll()
    });

</script>
