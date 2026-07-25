import { notFound } from "next/navigation";
import { isLocale, t, type Locale } from "@/lib/i18n";
import { site } from "@/lib/site";

export default async function PrivacyPage({
  params,
}: {
  params: Promise<{ locale: string }>;
}) {
  const { locale: raw } = await params;
  if (!isLocale(raw)) notFound();
  const locale = raw as Locale;

  const copy =
    locale === "ar"
      ? {
          intro:
            "تحترم كار سكراب دبي («نحن») خصوصيتك. توضح هذه السياسة المعلومات التي نجمعها عند استخدام موقعنا أو التواصل معنا لطلب عرض سعر، وكيف نستخدمها.",
          collectTitle: "المعلومات التي نجمعها",
          collect:
            "عند إرسال نموذج تواصل أو عرض سعر، قد نجمع اسمك ورقم هاتفك وبريدك الإلكتروني وتفاصيل المركبة ومحتوى الرسالة. قد تسجل سجلات الخادم عنوان IP ونوع المتصفح للأمان ومنع الرسائل المزعجة.",
          useTitle: "كيف نستخدم معلوماتك",
          use: "نستخدم بياناتك فقط للرد على الاستفسارات وتقديم تقييمات السكراب وترتيب الاستلام ومعالجة المدفوعات وتحسين خدماتنا. لا نبيع معلوماتك الشخصية.",
          shareTitle: "المشاركة",
          share:
            "قد نشارك المعلومات مع مزودي خدمات يساعدوننا في التشغيل (مثل الاستضافة أو البريد)، أو عندما يطلب القانون في الإمارات ذلك.",
          retainTitle: "الاحتفاظ بالبيانات",
          retain:
            "نحتفظ بسجلات الاستفسارات فقط طالما كانت مطلوبة لأغراض تجارية وقانونية، ثم نحذفها أو نُخفي هويتها.",
          choicesTitle: "خياراتك",
          choices: `يمكنك طلب الوصول إلى بياناتك الشخصية أو تصحيحها أو حذفها عبر مراسلتنا على ${site.email} أو الاتصال على ${site.phone}.`,
          updatesTitle: "التحديثات",
          updates:
            "قد نحدّث هذه السياسة من وقت لآخر. ستُنشر أحدث نسخة دائماً على هذه الصفحة.",
          updated: "آخر تحديث: يوليو 2026",
        }
      : {
          intro:
            'Car Scrap Dubai ("we", "us") respects your privacy. This policy explains what information we collect when you use our website or contact us for a scrap car quote, and how we use it.',
          collectTitle: "Information we collect",
          collect:
            "When you submit a contact or quote form, we may collect your name, phone number, email address, vehicle details, and message content. Server logs may also record IP address and browser type for security and spam prevention.",
          useTitle: "How we use your information",
          use: "We use your details only to respond to inquiries, provide scrap car valuations, arrange pickup, process payments, and improve our services. We do not sell your personal information.",
          shareTitle: "Sharing",
          share:
            "We may share information with service providers who help us operate (for example, hosting or email delivery), or when required by UAE law.",
          retainTitle: "Data retention",
          retain:
            "We keep inquiry records only as long as needed for business and legal purposes, then delete or anonymize them.",
          choicesTitle: "Your choices",
          choices: `You may request access, correction, or deletion of your personal data by emailing us at ${site.email} or calling ${site.phone}.`,
          updatesTitle: "Updates",
          updates:
            "We may update this policy from time to time. The latest version will always be posted on this page.",
          updated: "Last updated: July 2026",
        };

  return (
    <main id="main">
      <section className="page-hero">
        <div className="container">
          <h1>{t(locale, "privacy_title")}</h1>
        </div>
      </section>
      <section className="content-block">
        <div className="container prose">
          <p>{copy.intro}</p>
          <h2>{copy.collectTitle}</h2>
          <p>{copy.collect}</p>
          <h2>{copy.useTitle}</h2>
          <p>{copy.use}</p>
          <h2>{copy.shareTitle}</h2>
          <p>{copy.share}</p>
          <h2>{copy.retainTitle}</h2>
          <p>{copy.retain}</p>
          <h2>{copy.choicesTitle}</h2>
          <p>{copy.choices}</p>
          <h2>{copy.updatesTitle}</h2>
          <p>{copy.updates}</p>
          <p>
            <em>{copy.updated}</em>
          </p>
        </div>
      </section>
    </main>
  );
}
