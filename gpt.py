from flask import Flask, request, jsonify, render_template
import openai
import os

app = Flask(__name__)

# Set OpenAI API key
os.environ["OPENAI_API_KEY"] = "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"

# Initialize OpenAI client
client = openai.Client(
    api_key=os.environ.get("OPENAI_API_KEY") 
)

# Query GPT function using the OpenAI client
def query_gpt(prompt):
    try:
        chat_completion = client.chat.completions.create(
            model="gpt-3.5-turbo", 
            messages=[{"role": "user", "content": prompt}],
            max_tokens=200,
            temperature=0.7,
        )
        return chat_completion.choices[0].message.content
    except Exception as e:
        return f"Error: {str(e)}"


@app.route('/')
def home():
    return render_template('ui.html')  # Ensure 'ui.html' is in the 'templates' folder

# Route to handle the API request from the UI
@app.route('/ask-gpt', methods=['POST'])
def ask_gpt():
    data = request.get_json()
    prompt = data.get("prompt", "")
    if not prompt:
        return jsonify({"error": "Prompt is required"}), 400

    gpt_response = query_gpt(prompt)
    return jsonify({"response": gpt_response})

if __name__ == "__main__":
    app.run(port=5000, debug=True)
