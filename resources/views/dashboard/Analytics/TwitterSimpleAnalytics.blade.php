<link rel="stylesheet" href="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.css">
<script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>

<div id="AnalyticsPanel1" class="tab-pane fade in active" style="min-height: 600px">
    <fieldset class="cross-sharing-fieldset">
        <div class="form-group" >
            <div class="col-md-12">
                <legend class="cross-sharing-legend">Twitter Simple Analytics</legend>
            </div>
        </div>

            <select id="mySimpleAnalyticsSelect" class="selectpicker" title="Choose one of the following..." data-width="100%" data-live-search="true"  data-style="btn-info">
                <optgroup id="mySimpleAnalyticsSelectTwitter" label="Twitter">

                </optgroup>
            </select>

            <div id="block2" class="ct-chart ct-perfect-fourth"></div>
            <div id="simpleTwitter_url"></div>
    </fieldset>
</div>

<style>

    .btn-info{
        border-color: #538db0;
        color: #538db0;
    }

    .btn-info:hover, .btn-info:focus, .btn-info:active, .btn-info.active, .open > .btn-info.dropdown-toggle {
        background-color: transparent;
        color: #538db0;
        border-color: #538db0;
    }
    .dropdown-header
    {
        font-size: 24px;
        color:deepskyblue;
    }
    .bs-searchbox{
        height: 50px;
    }
    .bs-searchbox input.form-control {
        margin-bottom: 0;
        width: 100%;
        border: 1px solid #CCCCCC;
        border-radius: 10px;
    }
    #block2{
        max-height: 640px;
    }
</style>

<script>
    function sortByKey(array, key) {
        return array.sort(function(a, b) {
            var x = a[key]; var y = b[key];
            return ((x > y) ? -1 : ((x < y) ? 1 : 0));
        });
    }

    function GetTwitterList()
    {
        $.ajax({
            url: '/get_all_twitter',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            },
            dataType: 'text',
            data: {}
        })
            .done(function(data) {
                console.log("success");
            })
            .fail(function(data, request, error) {
                console.log(error);
            })
            .success(function(data) {
                var TwitterAccountList = JSON.parse(data);
                for(var i = 0; i < TwitterAccountList.length; i++)
                {
                    $("#mySimpleAnalyticsSelectTwitter").append("<option>"+ TwitterAccountList[i]["user_twitter_login"] +"</option>")
                }
            })
            .always(function(data) {
                console.log("complete");
            })
    }

    function GetBest20tweets(){
        var twitterAccountname = $("#mySimpleAnalyticsSelect").val();
        $.ajax({
            url: '/analytics_simple_best_tweets',
            type: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            },
            dataType: 'text',
            data: {twitterAccount:twitterAccountname}
        })
            .done(function(data) {
                console.log("success");
            })
            .fail(function(data, request, error) {
                console.log(error);
            })
            .success(function(data) {
                //delete all elements
                $('#simpleTwitter_url').empty();
                //start parsing
                var tweets = JSON.parse(data);
                for(var i = 0; i < tweets.length; i++)
                {
                    var sum_buf = tweets[i]["likes"]+ tweets[i]["retweets"];
                    tweets[i].sum = sum_buf;
                }
                sortByKey(tweets,'sum');
                tweets = tweets.slice(0,20);
                //array
                var twitterSimpleId = [];
                var twitterSimpleLikes = [];
                var twitterSimpleRetweets = [];

                for(var i = 0, j = 1; i < tweets.length; i++,j++)
                {
                    twitterSimpleId.push(j);
                    twitterSimpleLikes.push(tweets[i]["likes"]);
                    twitterSimpleRetweets.push(tweets[i]["retweets"]);
                }

                //graphics
                var data_ = {
                    labels: twitterSimpleId,
                    series: [
                        twitterSimpleLikes,
                        twitterSimpleRetweets
                    ]
                };

                var options = {
                    seriesBarDistance: 10
                };

                var responsiveOptions = [
                    ['screen and (max-width: 640px)', {
                        seriesBarDistance: 5,
                        axisX: {
                            labelInterpolationFnc: function (value) {
                                return value[0];
                            }
                        }
                    }]
                ];

                new Chartist.Bar('.ct-chart', data_, options, responsiveOptions);
                var twitterName = $("#mySimpleAnalyticsSelectTwitter option:selected").text();
                for(var i = 0, j = 1; i < tweets.length; i++, j++)
                {
                    $('#simpleTwitter_url').append("<a target='_blank' href='https://twitter.com/"+ twitterName +"/status/"+ tweets[i]['id'] +"'> Best tweets "+ j +" from " + twitterName + " <a/><br/>")
                }

            })
            .always(function(data) {
                console.log("complete");
            })
    }

    $("#AnalyticsPanel1").load(GetTwitterList());

    $("#mySimpleAnalyticsSelect").on('change', function() {
        GetBest20tweets()
    });

</script>


