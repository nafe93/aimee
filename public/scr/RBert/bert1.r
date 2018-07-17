  #!/usr/bin/env Rscript
  require("Quandl")
  require("ggplot2")

  args = commandArgs(trailingOnly=TRUE)
if (length(args)==0) {
  stop("2 argument must be supplied (input file).n", call.=FALSE)
}
  Quandl.api_key("6Wkcb5mZdDuGjydpen9k")

  d <- as.POSIXlt(as.Date(Sys.Date()))
  d$year <- d$year-3

  start_date = d

  # Load data
  SP500 = Quandl("YAHOO/INDEX_GSPC", trim_start=start_date, type="xts")
  EURUSD = Quandl("CURRFX/EURUSD", trim_start=start_date, type="xts")
  JPYUSD = Quandl("CURRFX/JPYUSD", trim_start=start_date, type="xts")
  BTCUSD = Quandl("BAVERAGE/USD", trim_start=start_date, type="xts")

  png(args[1])
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