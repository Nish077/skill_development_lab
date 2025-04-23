require 'sinatra'

# Route to display the form
get '/' do
  erb :form
end

# Route to handle form submission
post '/reverse' do
  first = params[:first_name]
  last = params[:last_name]
  @reversed = "#{last.reverse} #{first.reverse}"
  erb :result
end
