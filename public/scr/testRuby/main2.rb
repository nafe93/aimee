require 'CSV'

tickers = []

CSV.foreach("currfx_codes.csv") do |row|
  tickers.push(row[0].to_s.split("/")[1])
end

puts tickers