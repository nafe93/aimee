require 'rubygems'
require 'quandl'
require 'date'
require 'twitter'
require 'csv'

fxTickers = []

CSV.foreach("currfx_codes.csv") do |row|
  fxTickers.push(row[0].to_s.split("/")[1])
end

# turn off SSL
OpenSSL::SSL::VERIFY_PEER = OpenSSL::SSL::VERIFY_NONE
client = Twitter::REST::Client.new do |config|
  config.consumer_key        = "2nlvw5Z6eFLQ5ShhVlBLXuoEw"
  config.consumer_secret     = "opfZQipJajyjMKZ4NxKHbJZdnRukDvIbXgmZtvE09jWOxwIUdh"
  config.access_token        = "252081434-g8m6nvkQa5vJfisbgnCQgB3urkKCpXfDD4vajS53"
  config.access_token_secret = "kNmSFPmaMDJDNmm8w3CEFvtHJiKA3DBnd6TSGvGhcb1Ks"
end

$i = 0
t = Time.now()

while true do
  puts("Loop #$i @ "+t.to_s)


##################################################
########## S&P, Euro, Yen, BTC
##################################################


t = Time.now()
if t.saturday? && t.hour==18 && t.min==11
  puts("S&P, Euro, Yen, BTC")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now
  r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
r.eval <<EOF
  # Load required packages
  require("Quandl")
  require("ggplot2")
  Quandl.api_key("6Wkcb5mZdDuGjydpen9k")
  
  # Load data
  SP500 = Quandl("YAHOO/INDEX_GSPC", trim_start=start_date, type="xts")
  EURUSD = Quandl("CURRFX/EURUSD", trim_start=start_date, type="xts")
  JPYUSD = Quandl("CURRFX/JPYUSD", trim_start=start_date, type="xts")
  BTCUSD = Quandl("BAVERAGE/USD", trim_start=start_date, type="xts")
  
  png('graph.png')
  par(mfrow=c(2,2))
  plot(SP500, main = 'S&P 500', type='h')
  plot(BTCUSD, main = 'BTC/USD', ylab='BTC/USD', type='h')
  plot(JPYUSD, main = 'JPY/USD', ylab='JPY/USD', type='h')
  plot(EURUSD, main = 'EUR/USD', ylab='EUR/USD', type='h')
  
  retSP = round((as.numeric(last(SP500)$"Adj Close") / as.numeric(last(SP500,'1 year')$"Adj Close"[1])-1)*100, 2)
  retBTC = round((as.numeric(last(BTCUSD)$"24h Average") / as.numeric(last(BTCUSD,'1 year')$"24h Average"[1])-1)*100, 2)
  retJPY = round((as.numeric(last(JPYUSD)$Rate) / as.numeric(last(JPYUSD,'1 year')$Rate[1])-1)*100, 2)
  retEUR = round((as.numeric(last(EURUSD)$Rate) / as.numeric(last(EURUSD,'1 year')$Rate[1])-1)*100, 2)
  dev.off()
EOF

  retSP = r.pull "retSP"
  retBTC = r.pull "retBTC"
  retJPY = r.pull "retJPY"
  retEUR = r.pull "retEUR"
  
  message = "\#SP500: "+retSP.to_s+"% YTD\n\#BTCUSD: "+retBTC.to_s+"% YTD\n\#JPYUSD: "+retJPY.to_s+"% YTD\n\#EURUSD: "+retEUR.to_s+"% YTD"
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end

##################################################
########## S&P + VIX
##################################################


t = Time.now()
if t.hour==18 && t.min==11
  puts("S&P+VIX")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now
  r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
r.eval <<EOF
  # Load required packages
  require("Quandl")
  require("ggplot2")
  Quandl.api_key("6Wkcb5mZdDuGjydpen9k")
  
  # Load data
  SP500 = Quandl("YAHOO/INDEX_GSPC", trim_start=start_date, type="xts")
  VIX = Quandl("CBOE/VIX", trim_start=start_date, type="xts")
  
  retSP = round((as.numeric(last(SP500,'2 days')$Close[2]) / as.numeric(last(SP500,'2 days')$Close[1])-1)*100, 2)
  retVIX = round((as.numeric(last(VIX,'2 days')$'VIX Close'[2]) / as.numeric(last(VIX,'2 days')$'VIX Close'[1])-1)*100, 2)

  retSP = ifelse(retSP>0,paste(c('+',retSP), collapse=''),retSP)
  retVIX = ifelse(retVIX>0,paste(c('+',retVIX), collapse=''),retVIX)
  
  png('graph.png')
  par(mfrow=c(2,1))
  plot(SP500, main = paste(c('S&P 500 (',retSP,'%)'), collapse=''), type='l')
  plot(VIX, main = paste(c('VIX (',retVIX,'%)'), collapse=''), type='l')
  dev.off()
EOF

  retSP = r.pull "retSP"
  retVIX = r.pull "retVIX"

  message = "\#SP500: "+retSP.to_s+"%\n\#VIX: "+retVIX.to_s+"%"
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end


##################################################
########## RUB-Brent relationship
##################################################


t = Time.now()
if false#!t.sunday? && !t.saturday? && t.hour==18 && t.min==41
  puts("RUB-Brent relationship")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now
  r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
r.eval <<EOF
  # Load required packages
  require("Quandl")
  require("ggplot2")
  Quandl.api_key("6Wkcb5mZdDuGjydpen9k")
  
  # Load data
  RUB = Quandl("CURRFX/USDRUB", trim_start=start_date, type="zoo")
  Brent = Quandl("CHRIS/ICE_B1", trim_start=start_date, type="zoo")
  
  m = merge(RUB, Brent)
  xbr = m$Rate*m$Settle
  
  retRUB = round((as.numeric(last(RUB,'2 days')$Rate[2]) / as.numeric(last(RUB,'2 days')$Rate[1])-1)*100, 2)
  retBrent = round((as.numeric(last(xbr,'2 days')[2]) / as.numeric(last(xbr,'2 days')[1])-1)*100, 2)
  retRUB = ifelse(retRUB>0,paste(c('+',retRUB), collapse=''),retRUB)
  retBrent = ifelse(retBrent>0,paste(c('+',retBrent), collapse=''),retBrent)
  
  png('graph.png')
  par(mfrow=c(2,1))
  plot(m$Rate, main = paste(c('USDRUB (',retRUB,'%)'), collapse=''), type='l', lwd=2, xlab='year', ylab='price', las=1)
  grid(NULL, NULL)
  plot(xbr, main = paste(c('RUB per bbl Brent (',retBrent,'%)'), collapse=''), type='l', lwd=2, xlab='year', ylab='price', las=1)
  grid(NULL, NULL)
  
  pRUB = round(as.numeric(last(RUB$Rate)), 2)
  pXBR = round(as.numeric(last(xbr)), 2)
  pBrent = round(as.numeric(last(Brent$Settle)), 2)
  currentDate = index(last(RUB$Rate))
  dev.off()
EOF

  pRUB = r.pull "pRUB"
  pXBR = r.pull "pXBR"
  pBrent = r.pull "pBrent"
  currentDate = r.pull "currentDate"

  message = currentDate.to_s+"\n\#USDRUB: "+pRUB.to_s+"\n\#RUB per bbl \#Brent: "+pXBR.to_s+"\n\#USD per bbl \#Brent: "+pBrent.to_s
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end


##################################################
########## Volatility indexes
##################################################


t = Time.now()
if false#!t.sunday? && !t.saturday? && t.hour==19 && t.min==11
  puts("Volatility indexes")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now
  r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
r.eval <<EOF
  # Load required packages
  require("Quandl")
  require("ggplot2")
  Quandl.api_key("6Wkcb5mZdDuGjydpen9k")
  
  # Load data
  totalPC = Quandl("CBOE/TOTAL_PC", trim_start=start_date, type="xts")$'Prev. Day Open Interest'
  VVIX = Quandl("CBOE/VVIX", trim_start=start_date, type="xts")
  spxPC = Quandl("CBOE/SPX_PC", trim_start=start_date, type="xts")
  cVIX = Quandl("CBOE/VXFXI", trim_start=start_date, type="xts")
  
  retTotalPC = round((as.numeric(last(totalPC,'2 days')[2]) / as.numeric(last(totalPC,'2 days')[1])-1)*100, 2)
  retVVIX = round((as.numeric(last(VVIX,'2 days')[2]) / as.numeric(last(VVIX,'2 days')[1])-1)*100, 2)
  retSPXPC = round((as.numeric(last(spxPC$'S&P Put-Call Ratio','2 days')[2]) / as.numeric(last(spxPC$'S&P Put-Call Ratio','2 days')[1])-1)*100, 2)
  retCVIX = round((as.numeric(last(cVIX$Close,'2 days')[2]) / as.numeric(last(cVIX$Close,'2 days')[1])-1)*100, 2)
  
  retTotalPC = ifelse(retTotalPC>0,paste(c('+',retTotalPC), collapse=''),retTotalPC)
  retVVIX = ifelse(retVVIX>0,paste(c('+',retVVIX), collapse=''),retVVIX)
  retSPXPC = ifelse(retSPXPC>0,paste(c('+',retSPXPC), collapse=''),retSPXPC)
  retCVIX = ifelse(retCVIX>0,paste(c('+',retCVIX), collapse=''),retCVIX)
  
  png('graph.png')
  par(mfrow=c(2,2))
  plot(totalPC, main = paste(c('CBOE Total Ex Put-Call Ratio (',retTotalPC,'%)'), collapse=''), type='l')
  grid(NULL, NULL)
  plot(spxPC, main = paste(c('S&P 500 Index Put-Call Ratio (',retSPXPC,'%)'), collapse=''), type='l')
  grid(NULL, NULL)
  plot(VVIX, main = paste(c('VIX of VIX Index (',retVVIX,'%)'), collapse=''), type='h')
  grid(NULL, NULL)
  plot(cVIX, main = paste(c('China ETF Volatility Index (',retCVIX,'%)'), collapse=''), type='h')
  grid(NULL, NULL)
  
  pTotalPC = as.numeric(last(totalPC))
  pVVIX = as.numeric(last(VVIX))
  pspxPC = as.numeric(last(spxPC$'S&P Put-Call Ratio'))
  pcVIX = as.numeric(last(cVIX$Close))
  dev.off()
EOF

  pTotalPC = r.pull "pTotalPC"
  pspxPC = r.pull "pspxPC"
  pVVIX = r.pull "pVVIX"
  pcVIX = r.pull "pcVIX"
  
  message = "\#CBOE Total Ex P/C Ratio: "+pTotalPC.to_s+"\n\#SP500 P/C Ratio: "+pspxPC.to_s+"\n\#VIX of VIX: "+pVVIX.to_s+"\n\#China VIX: "+pcVIX.to_s
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end


##################################################
########## Major FX pairs
##################################################


t = Time.now()
if t.monday? && t.hour==8 && t.min==55
  puts("Major FX pairs")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now
  r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
r.eval <<EOF
  # Load required packages
  require("Quandl")
  require("ggplot2")
  Quandl.api_key("6Wkcb5mZdDuGjydpen9k")
  
  date = Sys.Date()
  offset = 365*1
  date = date - offset - 1
  
  # Load data
  d1 = Quandl("CURRFX/EURUSD", trim_start=date, type="zoo", transform="rdiff")
  d2 = Quandl("CURRFX/JPYUSD", trim_start=date, type="zoo", transform="rdiff")
  d3 = Quandl("CURRFX/GBPUSD", trim_start=date, type="zoo", transform="rdiff")
  d4 = Quandl("CURRFX/CHFUSD", trim_start=date, type="zoo", transform="rdiff")
  d5 = Quandl("CURRFX/CADUSD", trim_start=date, type="zoo", transform="rdiff")
  d6 = Quandl("CURRFX/AUDUSD", trim_start=date, type="zoo", transform="rdiff")
  d7 = Quandl("CURRFX/MXNUSD", trim_start=date, type="zoo", transform="rdiff")
  d8 = Quandl("CURRFX/CNYUSD", trim_start=date, type="zoo", transform="rdiff")
  
  dx = Quandl("CHRIS/ICE_DX1", trim_start=date, type="zoo", transform="rdiff")
  
  d = merge(d1,dx)
  d = d[!is.na(d$Settle)]
  d = cbind(d, d$Settle<0)
  colnames(d)[ncol(d)] = 'dxUD' # 1 is DX down
  p1 = ggplot(d, aes(x=Rate,fill=as.factor(dxUD)))+geom_histogram()+xlab('% change')+ggtitle('EURUSD returns YTD')+guides(fill=guide_legend(title=NULL))+theme(legend.position="none")+geom_vline(aes(xintercept=mean(Rate, na.rm=T)), color="black", linetype="dashed", size=1)
  
  d = merge(d2,dx)
  d = d[!is.na(d$Settle)]
  d = cbind(d, d$Settle<0)
  colnames(d)[ncol(d)] = 'dxUD' # 1 is DX down
  p2 = ggplot(d, aes(x=Rate,fill=as.factor(dxUD)))+geom_histogram()+xlab('% change')+ggtitle('JPYUSD returns YTD')+guides(fill=guide_legend(title=NULL))+theme(legend.position="none")+geom_vline(aes(xintercept=mean(Rate, na.rm=T)), color="black", linetype="dashed", size=1)
  
  d = merge(d3,dx)
  d = d[!is.na(d$Settle)]
  d = cbind(d, d$Settle<0)
  colnames(d)[ncol(d)] = 'dxUD' # 1 is DX down
  p3 = ggplot(d, aes(x=Rate,fill=as.factor(dxUD)))+geom_histogram()+xlab('% change')+ggtitle('GBPUSD returns YTD')+guides(fill=guide_legend(title=NULL))+theme(legend.position="none")+geom_vline(aes(xintercept=mean(Rate, na.rm=T)), color="black", linetype="dashed", size=1)
  
  d = merge(d4,dx)
  d = d[!is.na(d$Settle)]
  d = cbind(d, d$Settle<0)
  colnames(d)[ncol(d)] = 'dxUD' # 1 is DX down
  p4 = ggplot(d, aes(x=Rate,fill=as.factor(dxUD)))+geom_histogram()+xlab('% change')+ggtitle('CHFUSD returns YTD')+guides(fill=guide_legend(title=NULL))+theme(legend.position="none")+geom_vline(aes(xintercept=mean(Rate, na.rm=T)), color="black", linetype="dashed", size=1)
  
  d = merge(d8,dx)
  d = d[!is.na(d$Settle)]
  d = cbind(d, d$Settle<0)
  colnames(d)[ncol(d)] = 'dxUD' # 1 is DX down
  p8 = ggplot(d, aes(x=Rate,fill=as.factor(dxUD)))+geom_histogram()+xlab('% change')+ggtitle('CNYUSD returns YTD')+guides(fill=guide_legend(title=NULL))+theme(legend.position="none")+geom_vline(aes(xintercept=mean(Rate, na.rm=T)), color="black", linetype="dashed", size=1)
  
  multiplot <- function(..., plotlist=NULL, file, cols=1, layout=NULL) {
    library(grid)
  
    # Make a list from the ... arguments and plotlist
    plots <- c(list(...), plotlist)
  
    numPlots = length(plots)
  
    # If layout is NULL, then use 'cols' to determine layout
    if (is.null(layout)) {
      # Make the panel
      # ncol: Number of columns of plots
      # nrow: Number of rows needed, calculated from # of cols
      layout <- matrix(seq(1, cols * ceiling(numPlots/cols)),
                       ncol = cols, nrow = ceiling(numPlots/cols))
    }
  
    if (numPlots==1) {
      print(plots[[1]])
  
    } else {
      # Set up the page
      grid.newpage()
      pushViewport(viewport(layout = grid.layout(nrow(layout), ncol(layout))))
  
      # Make each plot, in the correct location
      for (i in 1:numPlots) {
        # Get the i,j matrix positions of the regions that contain this subplot
        matchidx <- as.data.frame(which(layout == i, arr.ind = TRUE))
  
        print(plots[[i]], vp = viewport(layout.pos.row = matchidx$row,
                                        layout.pos.col = matchidx$col))
      }
    }
  }
  png('graph.png')
  multiplot(p1, p3, p4, p8, cols=2)
  dev.off()
EOF

  message = "Red bars on DX down days\nGreen bars on DX up days\n\#FX \#EURUSD \#GBPUSD \#CHFUSD \#CNYUSD \#risk"
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end


##################################################
########## BTC with volume
##################################################


t = Time.now()
if t.hour==14 && t.min==30
  puts("BTC with volume")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now
  r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
r.eval <<EOF
  # Load required packages
  require("Quandl")
  require("ggplot2")
  Quandl.api_key("6Wkcb5mZdDuGjydpen9k")
  
  date = Sys.Date()
  offset = 100
  date = date - offset - 1
  
  # Load data
  d1 = Quandl("BAVERAGE/USD", trim_start=date, type="xts")
  png('graph.png')
  par(mfrow=c(2,1))
  plot(d1, type='l', main='BTC (BitcoinAverage)', ylab='USD', las=1)
  plot(d1$'Total Volume', type='l', main='Total Volume (BitcoinAverage)', las=1)
  dev.off()
EOF
  
  message = "\#bitcoin \#BTC"
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end


##################################################
########## Random FX pair distribution
##################################################


t = Time.now()
if (t.hour == 5 && t.min==01 && !t.saturday?) || (t.hour == 23 && t.min==01 && !t.saturday?)
  puts("Random FX pair distribution")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now
  r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
  ticker = "CURRFX/"+fxTickers.sample
  r.ticker = ticker
  
r.eval <<EOF
# Load required packages
require("Quandl")
require("ggplot2")
Quandl.api_key("6Wkcb5mZdDuGjydpen9k")

date = Sys.Date()
offset = 365*3 #3 years
date = date - offset - 1

retDist <- function(quandlCode = "CURRFX/EURUSD",date = Sys.Date()-3*365) {
  require("ggplot2")
  require("Quandl")
  s = strsplit(quandlCode, '/')
  s = s[[1]]
  s = s[length(s)]

  d = Quandl(quandlCode, trim_start=date, type="zoo")

  # get dollar index futures data
  dx = Quandl("CHRIS/ICE_DX1", trim_start=date, type="zoo")
  # remove data with zero volume
  dx = dx[dx$Volume > 0]
  # compute returns
  dx = merge(dx, diff(dx$Settle)/dx$Settle[-length(dx$Settle)])
  colnames(dx)[ncol(dx)] = 'dxRet'
  # lag the returns
  dx = merge(dx, lag(dx$dxRet,-1))
  colnames(dx)[ncol(dx)] = 'dxRetLagged'
  # create factor for previous C-C return on DX
  dx$dxRet = factor(dx$dxRetLagged > 0)
  # remove NAs
  dx = dx[!is.na(dx$dxRet)]

  # get gold futures data
  dg = Quandl("CHRIS/CME_GC1", trim_start=date, type="zoo")
  # remove data with zero volume
  dg = dg[dg$Volume > 0]
  # compute returns
  dg = merge(dg, diff(dg$Settle)/dg$Settle[-length(dg$Settle)])
  colnames(dg)[ncol(dg)] = 'dgRet'
  # lag the returns
  dg = merge(dg, lag(dg$dgRet,-1))
  colnames(dg)[ncol(dg)] = 'dgRetLagged'
  # create factor for previous C-C return on Gold
  dg$dgRet = factor(dg$dgRetLagged > 0)
  # remove NAs
  dg = dg[!is.na(dg$dgRet)]

  # get VIX data
  dvx = Quandl("CBOE/VIX", trim_start=date, type="zoo")
  currentVIX = as.numeric(last(dvx)$'VIX High')

  # create factor for previous C-C return on Gold
  dvx$dvxLevel = factor(as.numeric(dvx$'VIX High')  < currentVIX)

  # merge factors with main data series
  d = merge(d, dx$dxRet)
  d = merge(d, dg$dgRet)
  # compute returns
  d = merge(d, diff(d$Rate)/d$Rate[-length(d$Rate)])
  colnames(d)[ncol(d)] = 'ret'
  colnames(d)[ncol(d)-1] = "dgRet"
  colnames(d)[ncol(d)-2] = "dxRet"
  d = merge(d, dvx$dvxLevel)
  colnames(d)[ncol(d)] = 'dvxLevel'

  d = d[!is.na(d$dxRet)]
  d = d[!is.na(d$dgRet)]
  d = d[!is.na(d$ret)]

  # switch to data frame
  d = as.data.frame(d)

  # rename factors
  d$dgRet[d$dgRet==2] = "GC up C/C lagged 1d"
  d$dgRet[d$dgRet==1] = "GC down C/C lagged 1d"
  d$dxRet[d$dxRet==2] = "DX up C/C lagged 1d"
  d$dxRet[d$dxRet==1] = "DX down C/C lagged 1d"
  #d$dvXLevel[d$dvXLevel==2] = paste("VIX >=", currentVIX)
  #d$dvXLevel[d$dvXLevel==1] = paste("VIX <", currentVIX)

  # plot
  plot = ggplot(d, aes(x=ret,fill=factor(dvxLevel)))+geom_histogram()+xlab('% change')+ggtitle(paste(s, 'returns since',date))+guides(fill=guide_legend(title=NULL))+scale_fill_discrete(labels=c(paste("VIX >=", currentVIX), paste("VIX <", currentVIX)))
  plot + facet_grid(dxRet ~ dgRet) + geom_vline(aes(xintercept=mean(ret, na.rm=T)), color="red", linetype="dashed", size=1)+geom_density(alpha=.1)+theme(legend.position="bottom")
}
png('graph.png')
retDist(quandlCode=ticker, date=start_date)
dev.off()
EOF
  
  message = "\#FX \#trading\n\#VIX \#GC \#DX\n\#"+ticker.split("/")[1]
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end


##################################################
########## 3-day correlation
##################################################


t = Time.now()
if t.hour == 5 && t.min==22 && !t.saturday?
  puts("3-day correlation")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now
  r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
  
r.eval <<EOF
# Load required packages
require("Quandl")
require("ggplot2")
Quandl.api_key("6Wkcb5mZdDuGjydpen9k")

date = Sys.Date()
offset = 365*3 # number or days + 1
date = date - offset - 1

d0 = Quandl("CHRIS/EUREX_FDAX1", trim_start=date, type="zoo", transform="rdiff")
d1 = Quandl("CHRIS/CME_ES1", trim_start=date, type="zoo", transform="rdiff")
d2 = Quandl("CHRIS/CME_NQ1", trim_start=date, type="zoo", transform="rdiff")
d3 = Quandl("CHRIS/CME_US1", trim_start=date, type="zoo", transform="rdiff")
d4 = Quandl("CHRIS/LIFFE_R1", trim_start=date, type="zoo", transform="rdiff")
d5 = Quandl("CHRIS/CME_GC1", trim_start=date, type="zoo", transform="rdiff")
d6 = Quandl("CHRIS/CME_CL1", trim_start=date, type="zoo", transform="rdiff")
d7 = Quandl("CHRIS/CME_LC1", trim_start=date, type="zoo", transform="rdiff")
d8 = Quandl("CHRIS/CME_S1", trim_start=date, type="zoo", transform="rdiff")
d9 = Quandl("CHRIS/CME_LB1", trim_start=date, type="zoo", transform="rdiff")

d = merge(d0$Settle,d1$Settle,d2$Settle,d3$Settle,d4$Settle,d5$Settle,d6$Settle,d7$Settle,d8$Settle,d9$Settle)
colnames(d) = c("EUREX_FDAX1","CME_ES1","CME_NQ1", "CME_US1","LIFFE_R1","CME_GC1","CME_CL1","CME_LC1","CME_S1","CME_LB1")
d = d[,rev(colnames(d))]

c = cor(d,  use="complete")

library(ggplot2)
library(reshape2)

png('graph.png')
qplot(x=Var1, y=Var2, data=melt(c), fill=value, geom="tile")+scale_fill_gradient(low="#16B9BC", high="#F8766D")+geom_text(aes(label=round(value,2)))+xlab("")+ylab("")+theme(legend.position="none")+ggtitle(paste("Correlation from ",date," to ",index(last(d))," (",index(last(d))-date," days)",sep=""))+ theme(axis.text.x = element_text(angle = 90, hjust = 1))

dev.off()
EOF
  
  message = "3-year correlation\n\#trading \#risk\n\#ES \#FDAX \#US \#CL\n\#stocks \#bonds \#commodities"
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end


##################################################
########## 1-year correlation
##################################################


t = Time.now()
if t.hour == 5 && t.min==25 && !t.saturday?
  puts("1-year correlation")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now
  r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
  
r.eval <<EOF
# Load required packages
require("Quandl")
require("ggplot2")
Quandl.api_key("6Wkcb5mZdDuGjydpen9k")

date = Sys.Date()
offset = 365*1 # number or days + 1
date = date - offset - 1

d0 = Quandl("CHRIS/EUREX_FDAX1", trim_start=date, type="zoo", transform="rdiff")
d1 = Quandl("CHRIS/CME_ES1", trim_start=date, type="zoo", transform="rdiff")
d2 = Quandl("CHRIS/CME_NQ1", trim_start=date, type="zoo", transform="rdiff")
d3 = Quandl("CHRIS/CME_US1", trim_start=date, type="zoo", transform="rdiff")
d4 = Quandl("CHRIS/LIFFE_R1", trim_start=date, type="zoo", transform="rdiff")
d5 = Quandl("CHRIS/CME_GC1", trim_start=date, type="zoo", transform="rdiff")
d6 = Quandl("CHRIS/CME_CL1", trim_start=date, type="zoo", transform="rdiff")
d7 = Quandl("CHRIS/CME_LC1", trim_start=date, type="zoo", transform="rdiff")
d8 = Quandl("CHRIS/CME_S1", trim_start=date, type="zoo", transform="rdiff")
d9 = Quandl("CHRIS/CME_LB1", trim_start=date, type="zoo", transform="rdiff")

d = merge(d0$Settle,d1$Settle,d2$Settle,d3$Settle,d4$Settle,d5$Settle,d6$Settle,d7$Settle,d8$Settle,d9$Settle)
colnames(d) = c("EUREX_FDAX1","CME_ES1","CME_NQ1", "CME_US1","LIFFE_R1","CME_GC1","CME_CL1","CME_LC1","CME_S1","CME_LB1")
d = d[,rev(colnames(d))]

c = cor(d,  use="complete")

library(ggplot2)
library(reshape2)

png('graph.png')
qplot(x=Var1, y=Var2, data=melt(c), fill=value, geom="tile")+scale_fill_gradient(low="#16B9BC", high="#F8766D")+geom_text(aes(label=round(value,2)))+xlab("")+ylab("")+theme(legend.position="none")+ggtitle(paste("Correlation from ",date," to ",index(last(d))," (",index(last(d))-date," days)",sep=""))+ theme(axis.text.x = element_text(angle = 90, hjust = 1))

dev.off()
EOF
  
  message = "1-year correlation\n\#trading \#risk\n\#ES \#FDAX \#US \#CL\n\#stocks \#bonds \#commodities"
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end


##################################################
########## 50-day correlation
##################################################


t = Time.now()
if t.hour == 5 && t.min==28 && !t.saturday?
  puts("50-day correlation")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now
  r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
  
r.eval <<EOF
# Load required packages
require("Quandl")
require("ggplot2")
Quandl.api_key("6Wkcb5mZdDuGjydpen9k")

date = Sys.Date()
offset = 50 # number or days + 1
date = date - offset - 1

d0 = Quandl("CHRIS/EUREX_FDAX1", trim_start=date, type="zoo", transform="rdiff")
d1 = Quandl("CHRIS/CME_ES1", trim_start=date, type="zoo", transform="rdiff")
d2 = Quandl("CHRIS/CME_NQ1", trim_start=date, type="zoo", transform="rdiff")
d3 = Quandl("CHRIS/CME_US1", trim_start=date, type="zoo", transform="rdiff")
d4 = Quandl("CHRIS/LIFFE_R1", trim_start=date, type="zoo", transform="rdiff")
d5 = Quandl("CHRIS/CME_GC1", trim_start=date, type="zoo", transform="rdiff")
d6 = Quandl("CHRIS/CME_CL1", trim_start=date, type="zoo", transform="rdiff")
d7 = Quandl("CHRIS/CME_LC1", trim_start=date, type="zoo", transform="rdiff")
d8 = Quandl("CHRIS/CME_S1", trim_start=date, type="zoo", transform="rdiff")
d9 = Quandl("CHRIS/CME_LB1", trim_start=date, type="zoo", transform="rdiff")

d = merge(d0$Settle,d1$Settle,d2$Settle,d3$Settle,d4$Settle,d5$Settle,d6$Settle,d7$Settle,d8$Settle,d9$Settle)
colnames(d) = c("EUREX_FDAX1","CME_ES1","CME_NQ1", "CME_US1","LIFFE_R1","CME_GC1","CME_CL1","CME_LC1","CME_S1","CME_LB1")
d = d[,rev(colnames(d))]

c = cor(d,  use="complete")

library(ggplot2)
library(reshape2)

png('graph.png')
qplot(x=Var1, y=Var2, data=melt(c), fill=value, geom="tile")+scale_fill_gradient(low="#16B9BC", high="#F8766D")+geom_text(aes(label=round(value,2)))+xlab("")+ylab("")+theme(legend.position="none")+ggtitle(paste("Correlation from ",date," to ",index(last(d))," (",index(last(d))-date," days)",sep=""))+ theme(axis.text.x = element_text(angle = 90, hjust = 1))

dev.off()
EOF
  
  message = "50-day correlation\n\#trading \#risk\n\#ES \#FDAX \#US \#CL\n\#stocks \#bonds \#commodities"
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end


##################################################
########## Random futures spread
##################################################


t = Time.now()
if t.hour == 16 && t.min==43 && !t.saturday?
  puts("Random futures spread")
  R = ""
  require 'rinruby'

  r = RinRuby.new({:interactive=>false,:echo=>false})

  todayDate = DateTime.now

  
r.eval <<EOF

# Load required packages
require("Quandl")
require("ggplot2")
Quandl.api_key("6Wkcb5mZdDuGjydpen9k")
require("quantmod")

#set tickers
tickers = c("CME_ED", "CME_TY", "CME_FV", "CME_TU", "CME_US", "CME_BO", "CME_LC", "CME_SM", "CME_LN", "CME_FC","CME_CL","CME_NG", "CME_HH", "CME_RB")
ticker = sample(tickers,1)
contractMonth = sample(1:2, 1)

ticker0 = paste("CHRIS/",ticker,as.character(contractMonth+1),sep="")
ticker1 = paste("CHRIS/",ticker,as.character(contractMonth),sep="")
print(ticker0)
#compression = "weekly"
compression = "daily"

#set number of years to go back for chart
years = 30
start_date = Sys.Date()-365*years
end_date = Sys.Date()

#get and process data
d0 <- Quandl(ticker0,type ="xts", trim_start=start_date, trim_end=end_date, collapse=compression)
names(d0)[names(d0)=="Settle"]="Close"
d0 = cbind(d0$Open, d0$High, d0$Low, d0$Close, d0$Volume)
d1 <- Quandl(ticker1,type ="xts", trim_start=start_date, trim_end=end_date, collapse=compression)
names(d1)[names(d1)=="Settle"]="Close"
d1 = cbind(d1$Open, d1$High, d1$Low, d1$Close, d1$Volume)

#plot spread
z = cbind(d0$Close-d1$Close)
png('graph.png', width = 880, height = 440)
lineChart(z, name=paste(strsplit(ticker0, "/")[[1]][2],"-",strsplit(ticker1, "/")[[1]][2],"spread"),theme=chartTheme('white',up.col='#16B9BC',dn.col='#F8766D'))
dev.off()

EOF
  
  message = "\#spreads \#trading"
  print "Posting to twitter: "+message+"\n"
  client.update_with_media(message, File.new("graph.png"))
  sleep(60)
end

# t = Time.now()
# if true#t.hour == 5 && t.min==22 && !t.saturday?
  # R = ""
  # require 'rinruby'
# 
  # r = RinRuby.new({:interactive=>false,:echo=>false})
# 
  # todayDate = DateTime.now
  # r.start_date = (todayDate.year-3).to_s+'-'+todayDate.month.to_s+'-'+todayDate.day.to_s
  # ticker = "CURRFX/"+fxTickers.sample
  # r.ticker = ticker
#   
# r.eval <<EOF
# 
# dev.off()
# EOF
#   
  # message = "\#FX \#trading\n\#VIX \#GC \#DX\n\#"+ticker.split("/")[1]
  # print "Posting to twitter: "+message+"\n"
  # # client.update_with_media(message, File.new("graph.png"))
  # sleep(60)
# end

  $i +=1
  sleep(10)
end
