<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>New Architectural Inquiry - Emily Royce Architecture</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f4f4f6; color: #1a1a1a; margin: 0; padding: 20px; }
        .container { max-width: 600px; margin: 0 auto; background: #ffffff; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .header { background-color: #111111; color: #ffffff; padding: 30px; text-align: center; border-bottom: 3px solid #C5A880; }
        .header h1 { margin: 0; font-size: 22px; letter-spacing: 2px; text-transform: uppercase; font-weight: 300; }
        .header p { margin: 5px 0 0 0; color: #C5A880; font-size: 13px; letter-spacing: 1px; }
        .body { padding: 30px; }
        .field { margin-bottom: 20px; }
        .label { font-size: 11px; text-transform: uppercase; letter-spacing: 1px; color: #888888; font-weight: bold; margin-bottom: 4px; }
        .value { font-size: 15px; color: #222222; background: #f9f9fa; padding: 10px 14px; border-radius: 6px; border-left: 3px solid #111111; }
        .footer { background: #f9f9fa; padding: 20px; text-align: center; font-size: 12px; color: #888888; border-top: 1px solid #eeeeee; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>EMILY ROYCE</h1>
            <p>DESIGN & ARCHITECTURE STUDIO</p>
        </div>
        <div class="body">
            <h2 style="font-size: 18px; margin-top: 0; color: #111111;">New Client Inquiry Received</h2>
            <p style="color: #666666; font-size: 14px;">A new project request has been submitted through the studio website.</p>
            
            <div class="field">
                <div class="label">Client Name</div>
                <div class="value">{{ $inquiry->name }}</div>
            </div>
            <div class="field">
                <div class="label">Email Address</div>
                <div class="value"><a href="mailto:{{ $inquiry->email }}">{{ $inquiry->email }}</a></div>
            </div>
            <div class="field">
                <div class="label">Phone Number</div>
                <div class="value">{{ $inquiry->phone ?? 'Not provided' }}</div>
            </div>
            <div class="field">
                <div class="label">Service Requested</div>
                <div class="value">{{ $inquiry->service_type ?? 'General Architecture Consultation' }}</div>
            </div>
            <div class="field">
                <div class="label">Budget Range</div>
                <div class="value">{{ $inquiry->budget_range ?? 'Unspecified' }}</div>
            </div>
            <div class="field">
                <div class="label">Property / Site Area</div>
                <div class="value">{{ $inquiry->property_size_sqm ? $inquiry->property_size_sqm . ' m²' : 'N/A' }}</div>
            </div>
            <div class="field">
                <div class="label">Project Brief & Details</div>
                <div class="value" style="white-space: pre-wrap;">{{ $inquiry->message }}</div>
            </div>
        </div>
        <div class="footer">
            Sent automatically from <strong>Emily Royce Architecture</strong> &bull; Contact: <a href="mailto:emily@emilyroyce.com">emily@emilyroyce.com</a>
        </div>
    </div>
</body>
</html>
