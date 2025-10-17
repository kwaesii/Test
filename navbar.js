$(document).ready(() => {
    $("#dashboard").click(() => {
        $.ajax({
            url: "la3_dashboard.php",
        }).done((response) => {
            const div = $("<div>").html(response);
            const newContent = div.find(".content").html();
            $(".content").html(newContent);
            loadAllCharts();
        });
    });

    $("#account").click(() => {
        $.ajax({
            url: "la3_accountTable.php",
        }).done((response) => {
            const div = $("<div>").html(response);
            const newContent = div.find(".content").html();
            $(".content").html(newContent);
            addAccount();
            $(".view.btn").click(function () {
                const username = $(this).data("username");
                viewProfile(username);
            });
            $(".edit.btn").click(function () {
                const username = $(this).data("username");
                editAccount(username);
            });
            $(".delete.btn").click(function () {
                const username = $(this).data("username");
                const first_name = $(this).data("firstname");
                const last_name = $(this).data("lastname");
                deleteAccount(username, first_name, last_name);
            });
        });
    });


    $("#college").click(() => {
        $.ajax({
            url: "la3_collegeTable.php",
        }).done((response) => {
            const div = $("<div>").html(response);
            const newContent = div.find(".content").html();
            $(".content").html(newContent);
            addCollege();
            $(".edit.btn").click(function () {
                const college_code = $(this).data("college_code");
                editCollege(college_code);
            });
            $(".delete.btn").click(function () {
                const college_code = $(this).data("college_code");
                const college_desc = $(this).data("college_desc");
                deleteCollege(college_code, college_desc)
            });
        });
    });

    $("#position").click(() => {
        $.ajax({
            url: "la3_positionTable.php",
        }).done((response) => {
            const div = $("<div>").html(response);
            const newContent = div.find(".content").html();
            $(".content").html(newContent);
            addPosition();
            $(".edit.btn").click(function () {
                const position_code = $(this).data("position_code");
                editPosition(position_code);
            });
            $(".delete.btn").click(function () {
                const position_code = $(this).data("position_code");
                const position_desc = $(this).data("position_desc");
                deletePosition(position_code, position_desc)
            });
        });
    });

    $("#event").click(() => {
        $.ajax({
            url: "la3_eventTable.php",
        }).done((response) => {
            const div = $("<div>").html(response);
            const newContent = div.find(".content").html();
            $(".content").html(newContent);
            addEvent();
            $(".edit.btn").click(function () {
                const event_code = $(this).data("event_code");
                editEvent(event_code);
            });
            $(".delete.btn").click(function () {
                const event_code = $(this).data("event_code");
                const event_desc = $(this).data("event_desc");
                deleteEvent(event_code, event_desc)
            });
        });
    });

    $("#logout").click(() => {
        $.ajax({
            url: "la3_login.php",
        }).done((response) => {
            window.location.href = "la3_login.php";
        });
    });

    function addAccount() {
        $("#add-account").click(() => {
            $.ajax({
                url: "la3_addAcc_form.php",
            }).done((response) => {
                $("#bg-modal").show();
                $("#modal").show().html(response);

                $("form").submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);

                    $.ajax({
                        url: "la3_addAcc_process.php",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                    }).done((response) => {
                        if (response.trim() === "success") {
                            window.location.href = "la3_dashboard.php";
                        } else {
                            alert(response);
                        }
                    });
                });

                $("#close").click(() => {
                    $("#bg-modal").hide();
                    $("#modal").hide();
                });
            });
        });
    }

    function addCollege() {
        $("#add-college").click(() => {
            $.ajax({
                url: "la3_addCollege_form.php",
            }).done((response) => {
                $("#bg-modal").show();
                $("#modal").show().html(response);

                $("form").submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);

                    $.ajax({
                        url: "la3_addCollege_process.php",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                    }).done((response) => {
                        if (response.trim() === "success") {
                            window.location.href = "la3_dashboard.php";
                        } else {
                            alert(response);
                        }
                    });
                });

                $("#close").click(() => {
                    $("#bg-modal").hide();
                    $("#modal").hide();
                });
            });
        });
    }

    function addPosition() {
        $("#add-position").click(() => {
            $.ajax({
                url: "la3_addPosition_form.php",
            }).done((response) => {
                $("#bg-modal").show();
                $("#modal").show().html(response);

                $("form").submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);

                    $.ajax({
                        url: "la3_addPosition_process.php",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                    }).done((response) => {
                        if (response.trim() === "success") {
                            window.location.href = "la3_dashboard.php";
                        } else {
                            alert(response);
                        }
                    });
                });

                $("#close").click(() => {
                    $("#bg-modal").hide();
                    $("#modal").hide();
                });
            });
        });
    }

    function addEvent() {
        $("#add-event").click(() => {
            $.ajax({
                url: "la3_addEvent_form.php",
            }).done((response) => {
                $("#bg-modal").show();
                $("#modal").show().html(response);

                $("form").submit(function (e) {
                    e.preventDefault();
                    var formData = new FormData(this);

                    $.ajax({
                        url: "la3_addEvent_process.php",
                        type: "POST",
                        data: formData,
                        processData: false,
                        contentType: false,
                    }).done((response) => {
                        if (response.trim() === "success") {
                            window.location.href = "la3_dashboard.php";
                        } else {
                            alert(response);
                        }
                    });
                });

                $("#close").click(() => {
                    $("#bg-modal").hide();
                    $("#modal").hide();
                });
            });
        });
    }

    function viewProfile(username) {
        $.ajax({
            url: "la3_viewAcc.php",
            method: "GET",
            data: { username: username },
        }).done((response) => {
            $("#bg-modal").show();
            $("#modal").show().html(response);
            $("#close").click(() => {
                $("#bg-modal").hide();
                $("#modal").hide();
            });
            
                const ctx = document.getElementById('performanceChart');
                if (ctx) {
                    const teams = ctx.dataset.teams.split(',');
                    const attacks = ctx.dataset.attacks.split(',').map(Number);
                    const blocks = ctx.dataset.blocks.split(',').map(Number);
                    const aces = ctx.dataset.aces.split(',').map(Number);
    
                    const maxValue = Math.max(
                        ...attacks,
                        ...blocks,
                        ...aces,
                        2.0 
                    );
    
                    new Chart(ctx, {
                        type: 'bar',
                        data: {
                            labels: teams,
                            datasets: [
                                {
                                    label: 'Attacks',
                                    data: attacks,
                                    backgroundColor: '#295F98',
                                    borderColor: '#295F99',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Blocks',
                                    data: blocks,
                                    backgroundColor: '#F16767',
                                    borderColor: '#F16768',
                                    borderWidth: 1
                                },
                                {
                                    label: 'Aces',
                                    data: aces,
                                    backgroundColor: '#7BC0A3',
                                    borderColor: '#7BC0A4',
                                    borderWidth: 1
                                }
                            ]
                        },
                        options: {
                            responsive: true,
                            maintainAspectRatio: false,
                            scales: {
                                x: {
                                    grid: {
                                        display: true
                                    }
                                },
                                y: {
                                    beginAtZero: true,
                                    max: maxValue,
                                    ticks: {
                                        stepSize: 0.5, 
                                        callback: function(value) {
                                            return Number(value.toFixed(1));
                                        }
                                    },
                                    grid: {
                                        display: true
                                    }
                                }
                            },
                            plugins: {
                                legend: {
                                    position: 'top',
                                }
                            }
                        }
                    });
                }
            }, 100);
        };
    
    

    function editAccount(username) {
        $.ajax({
            url: "la3_editAcc_form.php",
            method: "GET",
            data: { username: username },
        }).done((response) => {
            $("#bg-modal").show();
            $("#modal").show().html(response);
            $("#close").click(() => {
                $("#bg-modal").hide();
                $("#modal").hide();
            });
        });
    }

    function editCollege(college_code) {
        $.ajax({
            url: "la3_editCollege_form.php",
            method: "GET",
            data: { college_code: college_code },
        }).done((response) => {
            $("#bg-modal").show();
            $("#modal").show().html(response);
            $("#close").click(() => {
                $("#bg-modal").hide();
                $("#modal").hide();
            });
        });
    }

    function editPosition(position_code) {
        $.ajax({
            url: "la3_editPosition_form.php",
            method: "GET",
            data: { position_code: position_code },
        }).done((response) => {
            $("#bg-modal").show();
            $("#modal").show().html(response);
            $("#close").click(() => {
                $("#bg-modal").hide();
                $("#modal").hide();
            });
        });
    }

    function editEvent(event_code) {
        $.ajax({
            url: "la3_editEvent_form.php",
            method: "GET",
            data: { event_code: event_code },
        }).done((response) => {
            $("#bg-modal").show();
            $("#modal").show().html(response);
            $("#close").click(() => {
                $("#bg-modal").hide();
                $("#modal").hide();
            });
        });
    }

    function deleteAccount(username, first_name, last_name) {
        $.ajax({
            url: "la3_deleteAcc_confirm.php",
            method: "GET",
            data: {
                username: username,
                first_name: first_name,
                last_name: last_name
            },
        }).done((response) => {
            $("#bg-modal").show();
            $("#modal").show().html(response);
            $("#cancel-delete").click(() => {
                $("#bg-modal").hide();
                $("#modal").hide();
            });
        });
    }

    function deleteCollege(college_code, college_desc) {
        $.ajax({
            url: "la3_deleteCollege_confirm.php",
            method: "GET",
            data: {
                college_code: college_code,
                college_desc: college_desc,
            },
        }).done((response) => {
            $("#bg-modal").show();
            $("#modal").show().html(response);
            $("#cancel-delete").click(() => {
                $("#bg-modal").hide();
                $("#modal").hide();
            });
        });
    }

    function deletePosition(position_code, position_desc) {
        $.ajax({
            url: "la3_deletePosition_confirm.php",
            method: "GET",
            data: {
                position_code: position_code,
                position_desc: position_desc,
            },
        }).done((response) => {
            $("#bg-modal").show();
            $("#modal").show().html(response);
            $("#cancel-delete").click(() => {
                $("#bg-modal").hide();
                $("#modal").hide();
            });
        });
    }

    function deleteEvent(event_code, event_desc) {
        $.ajax({
            url: "la3_deleteEvent_confirm.php",
            method: "GET",
            data: {
                event_code: event_code,
                event_desc: event_desc,
            },
        }).done((response) => {
            $("#bg-modal").show();
            $("#modal").show().html(response);
            $("#cancel-delete").click(() => {
                $("#bg-modal").hide();
                $("#modal").hide();
            });
        });
    }
});