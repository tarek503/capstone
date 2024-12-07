from flask import Flask, request, jsonify
import openai
import os

app = Flask(__name__)

# Set OpenAI API key
os.environ["OPENAI_API_KEY"] = "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"

# Query GPT function using OpenAI client
def query_gpt(prompt):
    try:
        # Initialize OpenAI client
        client = openai.Client(api_key=os.environ.get("OPENAI_API_KEY"))
        
        # Use the client.chat.completions.create method
        response = client.chat.completions.create(
            model="gpt-4o",
            messages=[{"role": "user", "content": prompt}],
            max_tokens=2000,
            temperature=1.0,
        )

        # Access the response content
        return response.choices[0].message.content
    except Exception as e:
        return f"Error: {str(e)}"

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
